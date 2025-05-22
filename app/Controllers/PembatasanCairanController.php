<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailPembatasanCairanModel;
use App\Models\PasienModel;
use App\Models\PembatasanCairanModel;
use CodeIgniter\HTTP\ResponseInterface;

class PembatasanCairanController extends BaseController
{
    public function index()
    {
        $model = new PembatasanCairanModel();
        $detail = new DetailPembatasanCairanModel();
        $mpasien = new PasienModel();
        $idpasien = session()->get('userNama');
        $asupan = $detail->getSumAsupanHari($idpasien);
        $max = $model->getTargetMax($idpasien);
        $level = session()->get('userLevel');
        if (empty($asupan)) {
            $dataasupan = '0';
        } else {
            $dataasupan = $asupan[0]['asupan'];
        }
        if (empty($max)) {
            $datamax = '0';
        } else {
            $datamax = $max[0]['totalasupan'];
        }
        if ($level == 3) {
            // dd($max);
            $data = [
                'databb' => $model->join('tbl_pasien', 'idpasienpembatasan=id')->where('id', $idpasien)->where('tglpembatasan', date('Y-m-d'))->findAll(),
                // 'datanotif' => $detail->where('detail_pasien', $idpasien)->where('detail_tanggal', date('Y-m-d'))->find(),
                'datapasien' => $model->join('tbl_pasien', 'idpasienpembatasan=id')->where('tglpembatasan', date('Y-m-d'))->where('id', $idpasien)->findAll(),
                'max' => $datamax,
                'validation' => \Config\Services::validation()
            ];
        } else {
            $data = [
                'databb' => $model->join('tbl_pasien', 'idpasienpembatasan=id')->findAll(),
                'datapasien' => $mpasien->findAll(),
                'max' => $datamax,
                'datanotif' => $model->join('tbl_pasien', 'idpasienpembatasan=id')->findAll(),
                'validation' => \Config\Services::validation()
            ];
        }
        // dd(array($asupan,$max,$idpasien,date('Y-m-d')));
        echo view('view_pembatasan', $data);
    }

    public function save()
    {
        $rules = [
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi'
                ]
            ],
            'target' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Target harus diisi'
                ]
            ]
        ];


        if ($this->validate($rules)) {
            $model = new PembatasanCairanModel();

            $data = array(
                'idpembatasan' => $model->generateKode(),
                'idpasienpembatasan' => $this->request->getPost('idpasien'),
                'tglpembatasan' => $this->request->getPost('tanggal'),
                'targetmaksimal' => $this->request->getPost('target'),
            );

            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data');
            return redirect()->to('/cairan');
        } else {
            session()->setFlashdata('failed', 'Data Gagal Disimpan' . $this->validator->listErrors());
            return redirect()->to('/cairan');
        }
    }

    public function edit()
    {
        $rules = [
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new PembatasanCairanModel();
            $detail = new DetailPembatasanCairanModel();
            $id = $this->request->getPost('kode');
            $data = array(
                'idpasienpembatasan' => $this->request->getPost('idpasien'),
                'tglpembatasan' => $this->request->getPost('tanggal'),
                'targetmaksimal' => $this->request->getPost('target'),
            );

            $model->update($id, $data);
            // dd($data,$id);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Catatan Pembatasan Cairan');
            return redirect()->to('/cairan');
        } else {
            $id = $this->request->getPost('kode');
            session()->setFlashdata('failed', 'Data Catatan Pembatasan Cairan Gagal Di Update' . $this->validator->listErrors());
            return redirect()->to('/cairan' . $id);
        }
    }

    public function delete()
    {
        $model = new PembatasanCairanModel();
        $id = $this->request->getPost('id');
        $model->delete($id);
        session()->setFlashdata('success', 'Berhasil Menghapus Data Catatan Pembatasan Cairan');
        return redirect()->to('/cairan');
    }

    public function savedetail()
    {
        $rules = [
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi'
                ]
            ],
            'asupan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asupan harus diisi'
                ]
            ]
        ];

        $model = new PembatasanCairanModel();
        $idp = $this->request->getPost('idp');
        $data = $model->where('idpasienpembatasan', $idp)->where('tglpembatasan', date('Y-m-d'))->find();
        dd($data);
        if ($this->validate($rules)) {

            $data = array(
                'targetmaksimal' => $this->request->getPost('target'),
            );

            $model->update($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data');
            return redirect()->to('/cairan');
        } else {
            session()->setFlashdata('failed', 'Data Gagal Disimpan' . $this->validator->listErrors());
            return redirect()->to('/cairan');
        }
    }

    public function report()
    {
        $model = new PembatasanCairanModel();
        $data['anak'] = $model->findAll();
        echo view('report/reportcairan', $data);
    }
}
