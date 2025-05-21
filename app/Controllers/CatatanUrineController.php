<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatatanUrineModel;
use App\Models\DetailCatatanUrineModel;
use App\Models\PasienModel;
use CodeIgniter\HTTP\ResponseInterface;

class CatatanUrineController extends BaseController
{
    public function index()
    {
        $detail = new DetailCatatanUrineModel();
        $model = new CatatanUrineModel();
        $mpasien = new PasienModel();
        $idpasien = session()->get('userNama');
        $level = session()->get('userLevel');
        $datanotif = $model->where('urineidpasien', $idpasien)->where('urinetanggal', date('Y-m-d'))->find();
        if ($level == 3) {
            $data = [
                'dataurinedetail' => $detail->join('tbl_master_urine', 'detail_urinewarna=tbl_master_urine.id')->join('tbl_pasien', 'detail_idpasien=tbl_pasien.id')->where('detail_idpasien', $idpasien)->where('detail_urinetanggal', date('Y-m-d'))->findAll(),
                'checkdata' => $datanotif,
                'masterurine' => $model->masterurine(),
                'datapasien' => $mpasien->findAll(),
                'validation' => \Config\Services::validation()
            ];
        } else {
            $data = [
                'dataurine' => $model->join('tbl_detail_catatan_urine', 'detail_idurine=idurine')
                    ->join('tbl_master_urine', 'detail_urinewarna=tbl_master_urine.id')
                    ->join('tbl_pasien', 'urineidpasien=tbl_pasien.id')
                    ->where('urinetanggal', date('Y-m-d'))->findAll(),
                'dataurinedetail' => $detail->join('tbl_master_urine', 'detail_urinewarna=tbl_master_urine.id')->join('tbl_pasien', 'detail_idpasien=tbl_pasien.id')->where('detail_idpasien', $idpasien)->where('detail_urinetanggal', date('Y-m-d'))->findAll(),
                'datapasien' => $mpasien->findAll(),
                'masterurine' => $model->masterurine(),
                'validation' => \Config\Services::validation()
            ];
        }
        // dd($datanotif);
        echo view('view_urine', $data);
    }

    public function save()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'urinevolume' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Urine Volume harus diisi'
                ]
            ],
            'urinewarna' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Urine Warna harus diisi'
                ]
            ]
        ];


        if ($this->validate($rules)) {
            $model = new CatatanUrineModel();
            $detail = new DetailCatatanUrineModel();
            //check data
            $check = $model->where('urineidpasien', $this->request->getPost('idpasien'))->where('urinetanggal', date('Y-m-d'))->find();
            // dd($check);
            if (empty($check)) {
                // dd('Data Full');
                //insert data master dan detail
                $datadetail = array(
                    'detail_idurine' => $model->generateKode(),
                    'detail_idpasien' => $this->request->getPost('idpasien'),
                    'detail_urinetanggal' => $this->request->getPost('tanggal'),
                    'detail_urinevolume' => $this->request->getPost('urinevolume'),
                    'detail_urinewarna' => $this->request->getPost('urinewarna'),
                );

                $data = array(
                    'idurine' => $model->generateKode(),
                    'urineidpasien' => $this->request->getPost('idpasien'),
                    'urinetanggal' => $this->request->getPost('tanggal'),
                    'created_at' => date('d-m-y H:i:s')
                );
                $detail->insert($datadetail);
                $model->insert($data);
                session()->setFlashdata('success', 'Berhasil Menyimpan Data');
                return redirect()->to('/urine');
            } else {
                //insert data detail
                dd('Data detail');
                $datadetail = array(
                    'detail_idurine' => $check['idurine'],
                    'detail_idpasien' => $this->request->getPost('idpasien'),
                    'detail_urinetanggal' => $this->request->getPost('tanggal'),
                    'detail_urinevolume' => $this->request->getPost('urinevolume'),
                    'detail_urinewarna' => $this->request->getPost('urinewarna'),
                );

                $detail->insert($datadetail);
                session()->setFlashdata('success', 'Berhasil Menyimpan Data');
                return redirect()->to('/urine');
            }
        } else {
            $session_error = [
                'error_urinevolume' => $validation->getError('urinevolume'),
                'error_urinefrekuensi' => $validation->getError('urinefrekuensi')
            ];
            session()->setFlashdata('failed', 'Data Gagal Disimpan, Periksa Data Input Kembali', $session_error);
            return redirect()->to('/urine')->withInput();
        }
    }

    public function edit()
    {
        $rules = [
            'urinevolume' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Urine Volume harus diisi'
                ]
            ],
            'urinefrekuensi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Urine Frekuensi harus diisi'
                ]
            ],
            'urinewarna' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Urine Warna harus diisi'
                ]
            ],
            'urinekonsistensi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Urine Konsistensi harus diisi'
                ]
            ]
        ];

        $id = $this->request->getPost('kode');
        if ($this->validate($rules)) {
            $model = new CatatanUrineModel();
            $data = array(
                'urineidpasien' => $this->request->getPost('idpasien'),
                'urinetanggal' => $this->request->getPost('tanggal'),
                'urinevolume' => $this->request->getPost('urinevolume'),
                'urinefrekuensi' => $this->request->getPost('urinefrekuensi'),
                'urinewarna' => $this->request->getPost('urinewarna'),
                'urinekonsistensi' => $this->request->getPost('urinekonsistensi'),
                'updated_at' => date('d-m-y H:i:s')
            );
            $model->update($id, $data);
            // dd($data,$id);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Catatan Urine');
            return redirect()->to('/urine');
        } else {
            session()->setFlashdata('failed', 'Data Catatan Urine Gagal Di Update' . $this->validator->listErrors());
            return redirect()->to('/urine' . $id);
        }
    }
    function editp()
    {
        $detail = new DetailCatatanUrineModel();
        $id = $this->request->getPost('id');
        $datadetail = array(
            'detail_idurine' => $this->request->getPost('idurine'),
            'detail_idpasien' => $this->request->getPost('idpasien'),
            'detail_urinetanggal' => $this->request->getPost('tanggal'),
            'detail_urinevolume' => $this->request->getPost('urinevolume'),
            'detail_urinewarna' => $this->request->getPost('urinewarna'),
        );
        $detail->update($id, $datadetail);
        session()->setFlashdata('success', 'Berhasil Update Data');
        return redirect()->to('/urine');
    }

    public function delete()
    {
        $model = new CatatanUrineModel();
        $id = $this->request->getPost('id');
        $model->delete($id);
        session()->setFlashdata('success', 'Berhasil Menghapus Data Catatan Urine');
        return redirect()->to('/urine');
    }

    //function save dari pasien
    public function savep()
    {
        $rules = [
            'urinevolume' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Urine Volume harus diisi'
                ]
            ]
        ];


        if ($this->validate($rules)) {
            $detail = new DetailCatatanUrineModel();
            $model = new CatatanUrineModel();
            $check = $model->where('urineidpasien', session()->get('userNama'))->where('urinetanggal', date('Y-m-d'))->find();
            // dd($check);
            if (empty($check)) {
                //insert data master dan detail
                $datadetail = array(
                    'detail_idurine' => $model->generateKode(),
                    'detail_idpasien' => $this->request->getPost('idpasien'),
                    'detail_urinetanggal' => $this->request->getPost('tanggal'),
                    'detail_urinevolume' => $this->request->getPost('urinevolume'),
                    'detail_urinewarna' => $this->request->getPost('urinewarna'),
                );

                $data = array(
                    'idurine' => $model->generateKode(),
                    'urineidpasien' => $this->request->getPost('idpasien'),
                    'urinetanggal' => $this->request->getPost('tanggal'),
                    'created_at' => date('d-m-y H:i:s')
                );
                $detail->insert($datadetail);
                $model->insert($data);
                session()->setFlashdata('success', 'Berhasil Menyimpan Data');
                return redirect()->to('/urine');
            } else {
                //insert data detail
                $datadetail = array(
                    'detail_idurine' => $check['idurine'],
                    'detail_idpasien' => $this->request->getPost('idpasien'),
                    'detail_urinetanggal' => $this->request->getPost('tanggal'),
                    'detail_urinevolume' => $this->request->getPost('urinevolume'),
                    'detail_urinewarna' => $this->request->getPost('urinewarna'),
                );

                $detail->insert($datadetail);
                session()->setFlashdata('success', 'Berhasil Menyimpan Data');
                return redirect()->to('/urine');
            }
        } else {

            session()->setFlashdata('failed', 'Data Gagal Disimpan, Periksa Data Input Kembali');
            return redirect()->to('/urine')->withInput();
        }
    }

    public function report()
    {
        $model = new CatatanUrineModel();
        $data['anak'] = $model->findAll();
        echo view('report/reporturine', $data);
    }
}
