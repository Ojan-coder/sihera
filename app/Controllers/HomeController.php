<?php

namespace App\Controllers;

use App\Models\DocterModel;
use App\Models\UserModel;

class HomeController extends BaseController
{
    public function index()
    {
        $modelGalery = new DocterModel();
        $data = [
            'datagalery' => $modelGalery->findAll(),
            'date' => date('h:i'),
        ];
        // 1Sampai9!@
        return view('view_home', $data);
    }

    public function updateprofile()
    {
        $id = $this->request->getPost('id');

        $model = new UserModel();
        $data = array(
            'user_name' => $this->request->getPost('nama')
        );
        $model->updateUser($data, $id);
        session()->setFlashdata('success', 'Berhasil update profile');
        session()->remove('userId');
        session()->remove('userNama');
        session()->remove('userEmail');
        session()->remove('userLevel');
        session()->setFlashdata('success', 'Berhasil keluar');
        return redirect()->to('/login');
    }

    public function changepassword()
    {
        $id = $this->request->getPost('id');

        $model = new UserModel();
        $data = array(
            'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        );
        $model->updateUser($data, $id);
        session()->setFlashdata('success', 'Berhasil ubah password');
        return redirect()->to('/');
    }
}
