<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {

        $model = new UserModel();
        $data = [
            'user' => $model->getUser()->getResultArray(),
            'datarole' => $model->getRole()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_user', $data);
    }

    public function save()
    {
        $rules = [
            'email' => [
                'rules' => 'required|max_length[100]|is_unique[tbl_user.email]',
                'errors' => [
                    'is_unique' => 'Email sudah ada',
                    'required' => 'Email harus diisi',
                    'max_length' => 'Kolom email tidak boleh lebih dari 100 karakter'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'max_length' => 'Kolom password tidak boleh lebih dari 100 karakter',
                    'min_length' => 'Kolom password setidaknya terdiri dari 4 karakter'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level harus diisi'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = array(
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('nama'),
                'nama' => $this->request->getPost('nama'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => $this->request->getPost('level')
            );
            $model->saveUser($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/user');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/user')->withInput()->with('validation', $validation);
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
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level harus diisi'
                ]
            ]
        ];

        $id = $this->request->getPost('id');

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = array(
                'username' => $this->request->getPost('nama'),
                'role' => $this->request->getPost('level')
            );
            $model->updateUser($data, $id);
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('/user');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/user' . $id)->withInput()->with('validation', $validation);
        }
    }

    public function delete()
    {
        $model = new UserModel();
        $id = $this->request->getPost('id');
        // dd($id);
        $model->deleteUser($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/user');
    }

    public function reset()
    {
        $id = $this->request->getPost('id');

        $model = new UserModel();
        $data = array(
            'password' => password_hash('12345678', PASSWORD_DEFAULT),
        );
        $model->updateUser($data, $id);
        session()->setFlashdata('success', 'Berhasil reset password user');
        return redirect()->to('/user');
    }

    public function report()
    {
        $model = new UserModel();
        $data['user'] = $model->getUser()->getResultArray();
        echo view('report/report_user', $data);
    }
}
