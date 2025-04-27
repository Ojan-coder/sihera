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
        $data = [
            'datajadwal' => $model->join('tbl_pasien','id=idpasien')->findAll(),
            'datapasien' => $mpasien->findAll(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_jadwal', $data);
    }

    public function save()
    {
       
        $mpasien = new JadwalHemodialisaModel();
        $rules = [
            'nik' => [
                'rules' => 'required|max_length[16]|min_length[16]|is_unique[tbl_pasien.nik]',
                'errors' => [
                    'is_unique' => 'Data Pasien Sudah Ada',
                    'required' => 'NIK harus diisi',
                    'min_length' => 'Kolom NIK tidak boleh kurang dari 16 karakter',
                    'max_length' => 'Kolom NIK tidak boleh lebih dari 16 karakter'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'umur' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Umur harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'jenkel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin harus diisi'
                ]
            ],
            'tinggibadan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tinggi Badan harus diisi'
                ]
            ],
            'beratbadan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Berat Badan harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'nohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No.Hp harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'max_length' => 'Kolom password tidak boleh lebih dari 100 karakter',
                    'min_length' => 'Kolom password setidaknya terdiri dari 4 karakter'
                ]
            ]
        ];

        if ($this->validate($rules)) {

            $data = array(
                'idjadwal' => $mpasien->generateKode(),
                'idpasien' => $this->request->getPost('idpasien'),
                'jadwal' => $this->request->getPost('jadwal'),
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
            'nik' => [
                'rules' => 'required|max_length[16]|min_length[16]',
                'errors' => [
                    'required' => 'NIK harus diisi',
                    'min_length' => 'Kolom NIK tidak boleh kurang dari 16 karakter',
                    'max_length' => 'Kolom NIK tidak boleh lebih dari 16 karakter'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'umur' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Umur harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'jenkel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin harus diisi'
                ]
            ],
            'tinggibadan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tinggi Badan harus diisi'
                ]
            ],
            'beratbadan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Berat Badan harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
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
        $model = new JadwalHemodialisaModel();
        if ($this->validate($rules)) {

            $data = array(
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'usia' => $this->request->getPost('umur'),
                'tgllahir' => $this->request->getPost('tgllahir'),
                'jenkel' => $this->request->getPost('jenkel'),
                'tinggibadan' => $this->request->getPost('tinggibadan'),
                'beratbadan' => $this->request->getPost('beratbadan'),
                'alamat' => $this->request->getPost('alamat'),
                'nohp' => $this->request->getPost('nohp')
            );
            $model->update($id, $data);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data dokter');
            return redirect()->to('/jadwal');
        } else {
            session()->setFlashdata('failed', 'Data dokter Gagal Di Update' . $this->validator->listErrors());
            return redirect()->to('/jadwal' . $id);
        }
    }

    public function delete()
    {
        $model = new JadwalHemodialisaModel();
        $id = $this->request->getPost('id');
        // dd($data);

        $model->delete($id);
        session()->setFlashdata('success', 'Berhasil Menghapus Data Pasien');
        return redirect()->to('/jadwal');
    }
}
