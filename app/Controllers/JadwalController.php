<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JadwalHemodialisaModel;
use App\Models\PasienModel;
use CodeIgniter\HTTP\ResponseInterface;

class JadwalController extends BaseController
{
    public function index()
    {
        $model = new JadwalHemodialisaModel();
        $mpasien = new PasienModel();
        $id = session()->get('userNama');
        if (session()->get('userLevel') != 3) {
            $data = $model->join('tbl_pasien', 'id=idpasien')->findAll();
        } else {
            $data = $model->join('tbl_pasien', 'id=idpasien')->where('idpasien', $id)->find();
        }
        $data = [
            'datajadwal' => $data,
            'datapasien' => $mpasien->findAll(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_jadwal', $data);
    }

    public function save()
    {

        $mpasien = new JadwalHemodialisaModel();
        $rules = [
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'jadwal' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Umur harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin harus diisi'
                ]
            ],
        ];

        if ($this->validate($rules)) {

            $data = array(
                'idjadwal' => $mpasien->generateKode(),
                'idpasien' => $this->request->getPost('idpasien'),
                'jadwal' => $this->request->getPost('jadwal'),
                'waktu' => $this->request->getPost('waktu'),
            );
            $mpasien->insert($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/jadwal');
        } else {
            session()->setFlashdata('failed', 'Data gagal disimpan' . $this->validator->listErrors());
            return redirect()->to('/jadwal')->withInput();
        }
    }

    public function edit()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'jadwal' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Umur harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin harus diisi'
                ]
            ],
        ];

        $id = $this->request->getPost('kode');
        $model = new JadwalHemodialisaModel();
        if ($this->validate($rules)) {

            $data = array(
                'idpasien' => $this->request->getPost('idpasien'),
                'jadwal' => $this->request->getPost('jadwal'),
                'waktu' => $this->request->getPost('waktu'),
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
        $model = new JadwalHemodialisaModel();
        $id = $this->request->getPost('id');
        // dd($data);

        $model->delete($id);
        session()->setFlashdata('success', 'Berhasil Menghapus Data Jadwal');
        return redirect()->to('/jadwal');
    }
}
