<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AktifitasFisikModel;
use App\Models\JenisAktifitasModel;
use App\Models\PasienModel;
use CodeIgniter\HTTP\ResponseInterface;

class AktifitasController extends BaseController
{
    public function index()
    {
        $model = new AktifitasFisikModel();
        $mjenis = new JenisAktifitasModel();
        $mpasien = new PasienModel();
        $data = [
            'dataaktifitas' => $model->join('tbl_master_aktifitas','fisikjenisaktifitas=idjenis')->join('tbl_pasien','fisikidpasien=id')->findAll(),
            'jenis' => $mjenis->findAll(),
            'datapasien' => $mpasien->findAll(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_aktifitas', $data);
    }

    public function save()
    {
        $rules = [
            'durasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Durasi harus diisi'
                ]
            ]
        ];


        if ($this->validate($rules)) {
            $model = new AktifitasFisikModel();

            $data = array(
                'idaktifitas' => $model->generateKode(),
                'fisikidpasien' => $this->request->getPost('idpasien'),
                'fisikjenisaktifitas' => $this->request->getPost('cbjenis'),
                'fisikdurasi' => $this->request->getPost('durasi'),
                'created_at' => date('d-m-y H:i:s')
            );

            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data');
            return redirect()->to('/aktifitas');
        } else {
            session()->setFlashdata('failed', 'Data Gagal Disimpan' . $this->validator->listErrors());
            return redirect()->to('/aktifitas');
        }
    }

    public function edit()
    {
        $rules = [
            'durasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Durasi harus diisi'
                ]
            ]
        ];

        $id = $this->request->getPost('kode');
        if ($this->validate($rules)) {
            $model = new AktifitasFisikModel();
            $data = array(
                'fisikidpasien' => $this->request->getPost('idpasien'),
                'fisikjenisaktifitas' => $this->request->getPost('cbjenis'),
                'fisikdurasi' => $this->request->getPost('durasi'),
                'updated_at' => date('d-m-y H:i:s')
            );
            $model->update($id, $data);
            // dd($data,$id);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Aktifitas');
            return redirect()->to('/aktifitas');
        } else {
            session()->setFlashdata('failed', 'Data Aktifitas Gagal Di Update' . $this->validator->listErrors());
            return redirect()->to('/aktifitas' . $id);
        }
    }

    public function delete()
    {
        $model = new AktifitasFisikModel();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        $model->delete($id);
        session()->setFlashdata('success', 'Berhasil Menghapus Data Aktifitas');
        return redirect()->to('/aktifitas');
    }

    public function report()
    {
        $model = new AktifitasFisikModel();
        $data['anak'] = $model->getRoom()->getResultArray();
        echo view('report/reportaktifitas', $data);
    }
}
