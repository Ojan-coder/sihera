<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatatanUrineModel;
use App\Models\PasienModel;
use CodeIgniter\HTTP\ResponseInterface;

class CatatanUrineController extends BaseController
{
    public function index()
    {
        $model = new CatatanUrineModel();
        $mpasien = new PasienModel();
        $data = [
            'dataurine' => $model->join('tbl_pasien', 'urineidpasien=id')->findAll(),
            'datapasien' => $mpasien->findAll(),
            'validation' => \Config\Services::validation()
        ];
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


        if ($this->validate($rules)) {
            $model = new CatatanUrineModel();

            $data = array(
                'idurine' => $model->generateKode(),
                'urineidpasien' => $this->request->getPost('idpasien'),
                'urinetanggal' => $this->request->getPost('tanggal'),
                'urinevolume' => $this->request->getPost('urinevolume'),
                'urinefrekuensi' => $this->request->getPost('urinefrekuensi'),
                'urinewarna' => $this->request->getPost('urinewarna'),
                'urinekonsistensi' => $this->request->getPost('urinekonsistensi'),
                'created_at' => date('d-m-y H:i:s')
            );

            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data');
            return redirect()->to('/urine');
        } else {
            $session_error = [
                'error_urinevolume' => $validation->getError('urinevolume'),
                'error_urinefrekuensi' => $validation->getError('urinefrekuensi')
            ];
            session()->setFlashdata('failed', 'Data Gagal Disimpan, Periksa Data Input Kembali',$session_error);
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

    public function delete()
    {
        $model = new CatatanUrineModel();
        $id = $this->request->getPost('id');
        $model->delete($id);
        session()->setFlashdata('success', 'Berhasil Menghapus Data Catatan Urine');
        return redirect()->to('/urine');
    }

    public function report()
    {
        $model = new CatatanUrineModel();
        $data['anak'] = $model->findAll();
        echo view('report/reporturine', $data);
    }
}
