<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatatanDietModel;
use App\Models\PasienModel;
use CodeIgniter\HTTP\ResponseInterface;

class CatatanDietController extends BaseController
{
    public function index()
    {
        $model = new CatatanDietModel();
        $mpasien = new PasienModel();
        $data = [
            'databb' => $model->join('tbl_pasien', 'dietidpasien=id')->findAll(),
            'datapasien' => $mpasien->findAll(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_diet', $data);
    }

    public function save()
    {
        $rules = [
            'protein' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Protein harus diisi'
                ]
            ],
            'natrium' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Natrium harus diisi'
                ]
            ],
            'kalsium' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kalsium harus diisi'
                ]
            ]
        ];


        if ($this->validate($rules)) {
            $model = new CatatanDietModel();

            $data = array(
                'iddiet' => $model->generateKode(),
                'dietidpasien' => $this->request->getPost('idpasien'),
                'diettanggal' => $this->request->getPost('tanggal'),
                'dietprotein' => $this->request->getPost('protein'),
                'dietnatrium' => $this->request->getPost('natrium'),
                'dietkalsium' => $this->request->getPost('kalsium'),
                'created_at' => date('d-m-y H:i:s')
            );

            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data');
            return redirect()->to('/diet');
        } else {
            session()->setFlashdata('failed', 'Data Gagal Disimpan' . $this->validator->listErrors());
            return redirect()->to('/diet');
        }
    }

    public function edit()
    {
        $rules = [
            'protein' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Protein harus diisi'
                ]
            ],
            'natrium' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Natrium harus diisi'
                ]
            ],
            'kalsium' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kalsium harus diisi'
                ]
            ]
        ];

        $id = $this->request->getPost('kode');
        if ($this->validate($rules)) {
            $model = new CatatanDietModel();
            $data = array(
                'dietidpasien' => $this->request->getPost('idpasien'),
                'diettanggal' => $this->request->getPost('tanggal'),
                'dietprotein' => $this->request->getPost('protein'),
                'dietnatrium' => $this->request->getPost('natrium'),
                'dietkalsium' => $this->request->getPost('kalsium'),
                'updated_at' => date('d-m-y H:i:s')
            );
            $model->update($id, $data);
            // dd($data,$id);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Catatan Diet');
            return redirect()->to('/diet');
        } else {
            session()->setFlashdata('failed', 'Data Catatan Diet Gagal Di Update' . $this->validator->listErrors());
            return redirect()->to('/diet' . $id);
        }
    }

    public function delete()
    {
        $model = new CatatanDietModel();
        $id = $this->request->getPost('id');
        $model->delete($id);
        session()->setFlashdata('success', 'Berhasil Menghapus Data Catatan Diet');
        return redirect()->to('/diet');
    }

    public function report()
    {
        $model = new CatatanDietModel();
        $data['anak'] = $model->findAll();
        echo view('report/reportdiet', $data);
    }
}
