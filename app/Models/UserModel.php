<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tbl_user';

    protected $allowedFields    = [
        'id',
        'username',
        'nama',
        'role',
        'email',
        'password',
        'statusakses',
        'created_at',
        'updated_at'
    ];
    public function getRole()
    {
        $bulder = $this->db->table('tbl_role');
        return $bulder->get();
    }
    public function getUser()
    {
        $bulder = $this->db->table('tbl_user')
            ->join('tbl_role', 'tbl_user.role=tbl_role.id');
        return $bulder->get();
    }
    public function saveUser($data)
    {
        $query = $this->db->table('tbl_user')->insert($data);
        return $query;
    }
    public function updateUser($data, $id)
    {
        $query = $this->db->table('tbl_user')->update($data, array('id' => $id));
        return $query;
    }
    public function deleteUser($id)
    {
        $query = $this->db->table('tbl_user')->delete(array('id' => $id));
        return $query;
    }
}
