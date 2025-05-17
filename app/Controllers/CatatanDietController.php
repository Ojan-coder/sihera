<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatatanDietModel;
use App\Models\DetailCatatanDietModel;
use App\Models\PasienModel;
use CodeIgniter\HTTP\ResponseInterface;

class CatatanDietController extends BaseController
{
    public function index()
    {
        $model = new CatatanDietModel();
        $detail = new DetailCatatanDietModel();
        $mpasien = new PasienModel();
        $idpasien = session()->get('userNama');
        $level = session()->get('userLevel');
        $check = $model->where('dietidpasien', $idpasien)->where('diettanggal', date('Y-m-d'))->find();
        $checkdetail = $model->join('tbl_detail_catatan_diet', 'detail_iddiet=iddiet')->where('dietidpasien', $idpasien)->where('diettanggal', date('Y-m-d'))->find();
        $waktu = $detail->where('detail_idpasien', $idpasien)->where('detail_diettanggal', date('Y-m-d'))->orderBy('id', 'DESC')->limit(1)->find();
        // dd($check[0]['iddiet']);
        if (empty($checkdetail)) {
            $datacheck = '';
            $iddiet = '';
        } else {
            $datacheck = $check[0]['dietprogram'];
            $iddiet = $check[0]['iddiet'];
        }
        if ($level == 3) {
            $data = [
                'databb' => $model->join('tbl_detail_catatan_diet', 'detail_iddiet=iddiet')
                    ->join('tbl_master_makan', 'detail_porsi=tbl_master_makan.id')
                    ->join('tbl_pasien', 'dietidpasien=tbl_pasien.id')
                    ->where('dietidpasien', $idpasien)->findAll(),
                'notif' => $checkdetail,
                'masternotif' => $check,
                'program' => $datacheck,
                'waktu' => $waktu,
                'dataprogramdiet' => $model->getProgramDiet(),
                'datamakanan' => $model->getMasterMakanan(),
                'datapasien' => $mpasien->findAll(),
                'validation' => \Config\Services::validation()
            ];
        } else {
            $data = [
                'databb' => $model->join('tbl_detail_catatan_diet', 'detail_iddiet=iddiet','LEFT')
                    ->join('tbl_master_makan', 'detail_porsi=tbl_master_makan.id','LEFT')
                    ->join('tbl_pasien', 'dietidpasien=tbl_pasien.id')->findAll(),
                'datapasien' => $mpasien->findAll(),
                'dataprogramdiet' => $model->getProgramDiet(),
                'validation' => \Config\Services::validation()
            ];
        }

        echo view('view_diet', $data);
    }

    public function save()
    {
        $rules = [
            'idpasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pasien harus diisi'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new CatatanDietModel();
            $program = $this->request->getPost('cbprogram');

            $data = array(
                'iddiet' => $model->generateKode(),
                'dietidpasien' => $this->request->getPost('idpasien'),
                'diettanggal' => $this->request->getPost('tanggal'),
                'dietprogram' => implode(',', $program),
                'created_at' => date('d-m-y H:i:s')
            );
            // dd($data);

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
            'program' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Program harus diisi'
                ]
            ]
        ];

        $id = $this->request->getPost('kode');
        if ($this->validate($rules)) {
            $model = new CatatanDietModel();
            $data = array(
                'dietidpasien' => $this->request->getPost('idpasien'),
                'diettanggal' => $this->request->getPost('tanggal'),
                'dietprogram' => $this->request->getPost('program'),
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

    public function savep()
    {
        $model = new CatatanDietModel();
        $detail = new DetailCatatanDietModel();
        $check = $model->where('dietidpasien', $this->request->getPost('idpasien'))->find();
        // dd($this->request->getPost('detail_iddiet'));
        $data = array(
            'detail_iddiet' => $check[0]['iddiet'],
            'detail_idpasien' => $this->request->getPost('idpasien'),
            'detail_diettanggal' => $this->request->getPost('tanggal'),
            'detail_keluhan' => $this->request->getPost('cbkeluhan'),
            'detail_porsi' => $this->request->getPost('cbwaktu')
        );

        $detail->insert($data);
        session()->setFlashdata('success', 'Berhasil Menyimpan Data');
        return redirect()->to('/diet');
    }

    public function report()
    {
        $model = new CatatanDietModel();
        $data['anak'] = $model->findAll();
        echo view('report/reportdiet', $data);
    }
}
