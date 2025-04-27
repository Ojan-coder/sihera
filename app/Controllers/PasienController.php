<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class PasienController extends BaseController
{
    public function index()
    {
        $model = new PasienModel();
        $data = [
            'datapasien' => $model->findAll(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_pasien', $data);
    }

    public function save()
    {
        $muser = new UserModel();
        $mpasien = new PasienModel();
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
                'id' => $mpasien->generateKode(),
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
            $datauser = [
                'username' => $$mpasien->generateKode(),
                'nama' => $this->request->getPost('nama'),
                'role' => 3,
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'statusakses' => 'Y',
                'created_at' => date('yyyy-mm-dd H:i:s'),
            ];
            $muser->insert($datauser);
            $mpasien->insert($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/patient');
        } else {
            session()->setFlashdata('failed', 'Data gagal disimpan' . $this->validator->listErrors());
            return redirect()->to('/patient')->withInput();
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
        $model = new PasienModel();
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
            return redirect()->to('/patient');
        } else {
            session()->setFlashdata('failed', 'Data dokter Gagal Di Update' . $this->validator->listErrors());
            return redirect()->to('/patient' . $id);
        }
    }

    public function delete()
    {
        $model = new PasienModel();
        $muser = new UserModel();
        $id = $this->request->getPost('id');
        $data = $muser->where('username',$id)->find();
        // dd($data);

        $model->delete($id);
        $muser->delete($data[0]['id']);
        session()->setFlashdata('success', 'Berhasil Menghapus Data Pasien');
        return redirect()->to('/patient');
    }

    public function register()
    {
        $muser = new UserModel();
        $mpasien = new PasienModel();
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
                'rules' => 'required|min_length[8]|max_length[100]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'max_length' => 'Kolom password tidak boleh lebih dari 100 karakter',
                    'min_length' => 'Kolom password setidaknya terdiri dari 8 karakter'
                ]
            ],
            'email' => [
                'rules' => 'required|max_length[100]|is_unique[tbl_user.email]',
                'errors' => [
                    'is_unique' => 'Email Sudah Terdaftar',
                    'required' => 'Email harus diisi',
                    'max_length' => 'Kolom email tidak boleh lebih dari 100 karakter'
                ]
            ]
        ];

        if ($this->validate($rules)) {

            $data = array(
                'id' => $mpasien->generateKode(),
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'usia' => $this->request->getPost('umur'),
                'tgllahir' => $this->request->getPost('tgllahir'),
                'jenkel' => $this->request->getPost('jenkel'),
                'tinggibadan' => $this->request->getPost('tinggibadan'),
                'beratbadan' => $this->request->getPost('beratbadan'),
                'alamat' => $this->request->getPost('alamat'),
                'nohp' => $this->request->getPost('nohp')
                // 'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                // 'role' => $this->request->getPost('level')
            );
            $datauser = [
                'username' => $mpasien->generateKode(),
                'nama' => $this->request->getPost('nama'),
                'role' => 3,
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'statusakses' => 'Y',
                'created_at' => date('yyyy-mm-dd H:i:s'),
            ];
            $muser->insert($datauser);
            $mpasien->insert($data);

            session()->setFlashdata('success', 'Data Pasien Berhasil Di Simpan, Silahkan Login');
            return redirect()->to('/register');
        } else {

            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/register')->withInput();
        }
    }
}
