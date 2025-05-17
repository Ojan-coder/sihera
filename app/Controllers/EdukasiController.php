<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EdukasiModel;
use App\Models\PasienModel;
use CodeIgniter\HTTP\ResponseInterface;

class EdukasiController extends BaseController
{
    public function index()
    {
        $model = new EdukasiModel();
        $mpasien = new PasienModel();
        $id = session()->get('userNama');
        $data = [
            'datajadwal' => $model->findAll(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_edukasi', $data);
    }

    public function save()
    {
        $mpasien = new EdukasiModel();
        $rules = [
            'topik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $kat = $this->request->getPost('kategori');
            if ($kat == "Doc") {
                $fileGambar = $this->request->getFile('fotodokter');
                $fileName = $fileGambar->getRandomName();
                // Upload image Room
                $fileGambar->move('edukasi/', $fileName);
            } else {
                $fileName = $this->request->getPost('linkvideo');
            }

            $data = array(
                'topik' => $this->request->getPost('topik'),
                'kategori' => $this->request->getPost('kategori'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'sumber' => $fileName,
            );
            $mpasien->insert($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/education');
        } else {
            session()->setFlashdata('failed', '' . $this->validator->listErrors());
            return redirect()->to('/education')->withInput();
        }
    }

    public function edit()
    {
        $rules = [
            'topik' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Judul harus diisi',
                    'max_length' => 'Kolom Judul tidak boleh lebih dari 100 karakter'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi'
                ]
            ],
            'sumber' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sumber harus diisi'
                ]
            ],
        ];

        $id = $this->request->getPost('kode');
        $model = new EdukasiModel();
        if ($this->validate($rules)) {

            $data = array(
                'topik' => $this->request->getPost('topik'),
                'kategori' => $this->request->getPost('kategori'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'sumber' => $this->request->getPost('sumber'),
            );
            $model->update($id, $data);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Jadwal');
            return redirect()->to('/jadwal');
        } else {
            session()->setFlashdata('failed', 'Data Jadwal Gagal Di Update' . $this->validator->listErrors());
            return redirect()->to('/jadwal' . $id);
        }
    }

    public function delete()
    {
        $model = new EdukasiModel();
        $id = $this->request->getPost('id');

        $model->delete($id);
        session()->setFlashdata('success', 'Berhasil Menghapus Data Jadwal');
        return redirect()->to('/jadwal');
    }
}
