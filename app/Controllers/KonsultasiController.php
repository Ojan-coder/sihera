<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KonsultasiModel;
use CodeIgniter\HTTP\ResponseInterface;

class KonsultasiController extends BaseController
{
    public function index()
    {
        $model = new KonsultasiModel();
        $data = [
            'datakonsultasi' => $model->findAll(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_konsultasi', $data);
    }

    public function save()
    {
        $rules = [
            'namagroup' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Group harus diisi'
                ]
            ],
            'anggota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Anggota harus diisi'
                ]
            ],
            'topik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Topik Diskusi harus diisi'
                ]
            ],
        ];


        if ($this->validate($rules)) {
            $model = new KonsultasiModel();

            $data = array(
                'idgroup' => $model->generateKode(),
                'namagroup' => $this->request->getPost('namagroup'),
                'anggota' => $this->request->getPost('anggota'),
                'topikdiskusi' => $this->request->getPost('topik'),
                'created_at' => date('d-m-y H:i:s')
            );

            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data');
            return redirect()->to('/konsultasi');
        } else {
            session()->setFlashdata('failed', 'Data Gagal Disimpan' . $this->validator->listErrors());
            return redirect()->to('/konsultasi');
        }
    }

    public function edit()
    {
        $rules = [
            'namagroup' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Group harus diisi'
                ]
            ],
            'anggota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Anggota harus diisi'
                ]
            ],
            'topik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Topik Diskusi harus diisi'
                ]
            ],
        ];

        $id = $this->request->getPost('kode');
        if ($this->validate($rules)) {
            $model = new KonsultasiModel();
            $data = array(
                'namagroup' => $this->request->getPost('namagroup'),
                'anggota' => $this->request->getPost('anggota'),
                'topikdiskusi' => $this->request->getPost('topik'),
                'updated_at' => date('d-m-y H:i:s')
            );
            $model->update($id, $data);
            // dd($data,$id);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Konsultasi');
            return redirect()->to('/konsultasi');
        } else {
            session()->setFlashdata('failed', 'Data Konsultasi Gagal Di Update' . $this->validator->listErrors());
            return redirect()->to('/konsultasi' . $id);
        }
    }

    public function delete()
    {
        $model = new KonsultasiModel();
        $id = $this->request->getPost('id');
        $model->delete($id);
        session()->setFlashdata('success', 'Berhasil Menghapus Data Konsultasi');
        return redirect()->to('/konsultasi');
    }

    public function report()
    {
        $model = new KonsultasiModel();
        $data['anak'] = $model->findAll();
        echo view('report/reportkonsultasi', $data);
    }
}
