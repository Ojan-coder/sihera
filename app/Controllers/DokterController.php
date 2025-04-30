<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DocterModel;
use CodeIgniter\HTTP\ResponseInterface;

class DokterController extends BaseController
{
    public function index()
    {
        $model = new DocterModel();
        $data = [
            'dokter' => $model->findAll(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_dokter', $data);
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
            'tgllahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'spesialis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Spesialis harus diisi'
                ]
            ],
            'nohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No.Hp harus diisi'
                ]
            ],
            'fotodokter' => [
                'rules' => 'mime_in[fotodokter,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'mime_in' => 'File yang dipilih bukan gambar',
                ]
            ]
        ];


        if ($this->validate($rules)) {
            $model = new DocterModel();

            $fileGambar = $this->request->getFile('fotodokter');
            $fileName = $fileGambar->getRandomName();
            // Upload image Room
            $fileGambar->move('dokter/', $fileName);

            $data = array(
                'iddokter' => $model->generateKode(),
                'namadokter' => $this->request->getPost('nama'),
                'tgllahirdokter' => $this->request->getPost('tgllahir'),
                'alamatdokter' => $this->request->getPost('alamat'),
                'spesialisdokter' => $this->request->getPost('spesialis'),
                'nohpdokter' => $this->request->getPost('nohp'),
                'gambardokter' => $fileName,
            );

            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/docter');
        } else {
            session()->setFlashdata('failed', 'Data gagal disimpan' . $this->validator->listErrors());
            return redirect()->to('/docter');
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
            'tgllahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'spesialis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Spesialis harus diisi'
                ]
            ],
            'nohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No.Hp harus diisi'
                ]
            ]
        ];

        $id = $this->request->getPost('kode');
        $model = new DocterModel();
        if ($this->validate($rules)) {

            $data = $model->find($id);

            $fileGambar = $this->request->getFile('fotodokter');

            if ($fileGambar != "") {
                unlink("dokter/" . $data['gambardokter']);
                $fileName = $fileGambar->getRandomName();
                // Upload image 
                $fileGambar->move('dokter/', $fileName);
                $data = array(
                    'namadokter' => $this->request->getPost('nama'),
                    'tgllahirdokter' => $this->request->getPost('tgllahir'),
                    'alamatdokter' => $this->request->getPost('alamat'),
                    'spesialisdokter' => $this->request->getPost('spesialis'),
                    'nohpdokter' => $this->request->getPost('nohp'),
                    'gambardokter' => $fileName,
                );
                $model->update($id, $data);
                // dd($data,$id);
                session()->setFlashdata('success', 'Berhasil Mengupdate Data dokter');
                return redirect()->to('/dokter');
            } else {
                $data = array(
                    'namadokter' => $this->request->getPost('nama'),
                    'tgllahirdokter' => $this->request->getPost('tgllahir'),
                    'alamatdokter' => $this->request->getPost('alamat'),
                    'spesialisdokter' => $this->request->getPost('spesialis'),
                    'nohpdokter' => $this->request->getPost('nohp')
                );
                $model->update($id, $data);
                // dd($data,$id);
                session()->setFlashdata('success', 'Berhasil Mengupdate Data dokter');
                return redirect()->to('/docter');
            }
        } else {
            session()->setFlashdata('failed', 'Data dokter Gagal Di Update' . $this->validator->listErrors());
            return redirect()->to('/docter' . $id);
        }
    }

    public function delete()
    {
        $model = new DocterModel();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        $imageName = $data['gambardokter'];
        $filePath = "dokter/" . $imageName;
        // dd($imageName);

        // Check if the file exists
        if (file_exists($filePath)) {
            // Attempt to delete the file
            if (unlink($filePath)) {
                echo 'File deleted successfully.';
                $model->delete($id);
                session()->setFlashdata('success', 'Berhasil Menghapus Data Docter');
                return redirect()->to('/docter');
            } else {
                echo 'Failed to delete the file.';
            }
        } else {
            echo 'File does not exist.';
        }
    }

    public function report()
    {
        $model = new DocterModel();
        $data['dokter'] = $model->findAll();
        echo view('report/reportdocter', $data);
    }
}
