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
        $mpasien = new PasienModel();
        $idpasien = session()->get('userNama');
        $level = session()->get('userLevel');
        if ($level == 3) {
            $data = [
                'databb' => $model->join('tbl_pasien', 'idpasienpembatasan=id')->where('id',$idpasien)->findAll(),
                'datanotif' => $model->join('tbl_pasien', 'idpasienpembatasan=id')->findAll(),
                'datapasien' => $model->join('tbl_pasien', 'idpasienpembatasan=id')->where('id',$idpasien)->findAll(),
                'validation' => \Config\Services::validation()
            ];
        } else {
            $data = [
                'databb' => $model->join('tbl_pasien', 'idpasienpembatasan=id')->findAll(),
                'datapasien' => $mpasien->findAll(),
                'validation' => \Config\Services::validation()
            ];
        }
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
            ],
            'asupan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asupan harus diisi'
                ]
            ],
            'target' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Target harus diisi'
                ]
            ]
        ];

        $id = $this->request->getPost('kode');
        if ($this->validate($rules)) {
            $model = new PembatasanCairanModel();
            $data = array(
                'idpasienpembatasan' => $this->request->getPost('idpasien'),
                'tglpembatasan' => $this->request->getPost('tanggal'),
                'asupancairan' => $this->request->getPost('asupan'),
                'targetmaksimal' => $this->request->getPost('target'),
            );
            $model->update($id, $data);
            // dd($data,$id);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Catatan Pembatasan Cairan');
            return redirect()->to('/cairan');
        } else {
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


        if ($this->validate($rules)) {
            $model = new DetailPembatasanCairanModel();

            $data = array(
                'detail_idpembatasan' => $this->request->getPost('idpembatasan'),
                'detail_tanggal' => $this->request->getPost('tanggal'),
                'detail_pasien' => $this->request->getPost('idp'),
                'detail_asupanhari' => $this->request->getPost('asupan'),
            );

            $model->insert($data);
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
