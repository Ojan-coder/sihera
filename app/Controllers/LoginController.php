<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\KegiatanModel;


class LoginController extends BaseController
{
    public function index()
    {
        if (session()->get('userId')) {
            return redirect()->to(base_url('/Home'));
        }
        echo view('view_login');
        // echo view('frontend/index');
    }

    public function ceklogin()
    {
        $model = new LoginModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getVar('password');

        $user = $model->cekLogin($email);
        // dd($user);
        if ($user) {
            if ($user['statusakses'] == "T") {
                session()->setFlashdata('message', 'Akun Anda Belum Aktif, Hubungi Admin');
                return redirect()->to('/login');
            }else if (password_verify($password, $user['password'])) {
                session()->set('userId', $user['id']);
                session()->set('userNama', $user['username']);
                session()->set('nama', $user['nama']);
                session()->set('userEmail', $user['email']);
                session()->set('userLevel', $user['role']);
                return redirect()->to('/Home');
            } else {
                session()->setFlashdata('message', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('message', 'Email belum terdaftar');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->remove('userId');
        session()->remove('userNama');
        session()->remove('userEmail');
        session()->remove('userLevel');
        session()->setFlashdata('success', 'Berhasil keluar');
        return redirect()->to('/login');
    }
}
