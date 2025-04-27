<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AktifitasFisikModel;
use CodeIgniter\HTTP\ResponseInterface;

class AktifitasController extends BaseController
{
    public function index()
    {
        $model = new AktifitasFisikModel();
        $data = [
            'koderoom' => $model->generateKode(),
            'dtaktifitas' => $model->findAll(),
            'dtpasien' => $model->findAll(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_aktifitas', $data);
    }

    public function save()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Judul dokter harus diisi'
                ]
            ],
            'tgldokter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Kamar harus diisi'
                ]
            ],
            'tgldokter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Kamar harus diisi'
                ]
            ],
            'fotodokter' => [
                'rules' => 'mime_in[fotodokter,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'mime_in' => 'File yang dipilih bukan gambar',
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi'
                ]
            ]
        ];


        if ($this->validate($rules)) {
            $model = new AktifitasFisikModel();

            $fileGambar = $this->request->getFile('fotodokter');
            $fileName = $fileGambar->getRandomName();
            // Upload image Room
            $fileGambar->move('dokter/', $fileName);

            $data = array(
                'kodedokter' => $model->generateKode(),
                'namadokter' => $this->request->getPost('nama'),
                'tgldokter' => $this->request->getPost('tgldokter'),
                'tgldokter' => $this->request->getPost('tgldokter'),
                'ketdokter' => $this->request->getPost('keterangan'),
                'gambardokter' => $fileName,
            );

            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/dokter');
        } else {
            session()->setFlashdata('failed', 'Data gagal disimpan' . $this->validator->listErrors());
            return redirect()->to('/dokter');
        }
    }

    public function edit()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Judul dokter harus diisi'
                ]
            ],
            'tgldokter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Kamar harus diisi'
                ]
            ],
            'tgldokter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Kamar harus diisi'
                ]
            ],
            'fotodokter' => [
                'rules' => 'mime_in[fotodokter,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'mime_in' => 'File yang dipilih bukan gambar',
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi'
                ]
            ]
        ];

        $id = $this->request->getPost('kode');
        if ($this->validate($rules)) {
            $model = new AktifitasFisikModel();
            $data = $model->find($id);

            $fileGambar = $this->request->getFile('fotodokter');

            if ($fileGambar != "") {
                unlink("dokter/" . $data['gambardokter']);
                $fileName = $fileGambar->getRandomName();
                // Upload image 
                $fileGambar->move('dokter/', $fileName);
                $data = array(
                    'kodedokter' => $model->generateKode(),
                    'namadokter' => $this->request->getPost('nama'),
                    'tgldokter' => $this->request->getPost('tgldokter'),
                    'tgldokter' => $this->request->getPost('tgldokter'),
                    'ketdokter' => $this->request->getPost('keterangan'),
                    'gambardokter' => $fileName,
                );
                $model->update($id, $data);
                // dd($data,$id);
                session()->setFlashdata('success', 'Berhasil Mengupdate Data dokter');
                return redirect()->to('/dokter');
            } else {
                $data = array(
                    'kodedokter' => $model->generateKode(),
                    'namadokter' => $this->request->getPost('nama'),
                    'tgldokter' => $this->request->getPost('tgldokter'),
                    'tgldokter' => $this->request->getPost('tgldokter'),
                    'ketdokter' => $this->request->getPost('keterangan')
                );
                $model->update($id, $data);
                // dd($data,$id);
                session()->setFlashdata('success', 'Berhasil Mengupdate Data dokter');
                return redirect()->to('/dokter');
            }
        } else {
            session()->setFlashdata('failed', 'Data dokter Gagal Di Update' . $this->validator->listErrors());
            return redirect()->to('/dokter' . $id);
        }
    }

    public function delete()
    {
        $model = new AktifitasFisikModel();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        $model->delete($id);
        session()->setFlashdata('success', 'Berhasil Menghapus Data Room');
        return redirect()->to('/aktifitas');
    }

    public function report()
    {
        $model = new AktifitasFisikModel();
        $data['anak'] = $model->getRoom()->getResultArray();
        echo view('report/reportaktifitas', $data);
    }
}
