<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    public function cekLogin($email)
    {
        return $this->db->table('tbl_user')
            ->join('tbl_role', 'tbl_user.role=tbl_role.id')
            ->where(array('email' => $email))
            ->orWhere(array('username' => $email))
            ->get()->getRowArray();
    }
}
