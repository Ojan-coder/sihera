<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatatanBBModel;
use App\Models\PasienModel;
use CodeIgniter\HTTP\ResponseInterface;

class CatatanBBController extends BaseController
{
    public function index()
    {
        $model = new CatatanBBModel();
        $mpasien = new PasienModel();
        $idpasien = session()->get('userNama');
        $level = session()->get('userLevel');
        $check = $model->where('bbidpasien', $idpasien)->find();
        // dd($check);
        if ($level == 3) {
            $data = [
                'databb' => $model->join('tbl_pasien', 'bbidpasien=id')->where('bbidpasien', $idpasien)->where('DATE(created_at)', date('Y-m-d h:i:s'))->findAll(),
                'datapasien' => $mpasien->findAll(),
                'check' => $check,
                'validation' => \Config\Services::validation()
            ];
        } else {
            $data = [
                'databb' => $model->join('tbl_pasien', 'bbidpasien=id')->findAll(),
                'datapasien' => $mpasien->findAll(),
                'validation' => \Config\Services::validation()
            ];
        }

        echo view('view_bb', $data);
    }

    public function save()
    {
        $rules = [
            'bbsebelumhd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Berat Badan Sebelum HD harus diisi'
                ]
            ],
            'bbsesudahhd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Berat Badan Sesudah HD harus diisi'
                ]
            ]
        ];


        if ($this->validate($rules)) {
            $model = new CatatanBBModel();

            $data = array(
                'idbb' => $model->generateKode(),
                'bbidpasien' => $this->request->getPost('idpasien'),
                'bbsebelumhd' => $this->request->getPost('bbsebelumhd'),
                'bbsesudahhd' => $this->request->getPost('bbsesudahhd'),
                'created_at' => date('d-m-y H:i:s')
            );

            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data');
            return redirect()->to('/bb');
        } else {
            session()->setFlashdata('failed', 'Data Gagal Disimpan' . $this->validator->listErrors());
            return redirect()->to('/bb');
        }
    }

    public function edit()
    {
        $rules = [
            'bbsebelumhd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Berat Badan Sebelum HD harus diisi'
                ]
            ],
            'bbsesudahhd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Berat Badan Sesudah HD harus diisi'
                ]
            ]
        ];

        $id = $this->request->getPost('kode');
        if ($this->validate($rules)) {
            $model = new CatatanBBModel();
            $data = array(
                'bbidpasien' => $this->request->getPost('idpasien'),
                'bbsebelumhd' => $this->request->getPost('bbsebelumhd'),
                'bbsesudahhd' => $this->request->getPost('bbsesudahhd'),
                'updated_at' => date('d-m-y H:i:s')
            );
            $model->update($id, $data);
            // dd($data,$id);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Catatan Berat Badan');
            return redirect()->to('/bb');
        } else {
            session()->setFlashdata('failed', 'Data Catatan Berat Badan Gagal Di Update' . $this->validator->listErrors());
            return redirect()->to('/bb' . $id);
        }
    }

    public function delete()
    {
        $model = new CatatanBBModel();
        $id = $this->request->getPost('id');
        $model->delete($id);
        session()->setFlashdata('success', 'Berhasil Menghapus Data Catatan Berat Badan');
        return redirect()->to('/bb');
    }

    public function report()
    {
        $model = new CatatanBBModel();
        $data['anak'] = $model->findAll();
        echo view('report/reportbb', $data);
    }
}
