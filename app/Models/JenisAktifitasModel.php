<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisAktifitasModel extends Model
{
    protected $table            = 'tbl_master_aktifitas';
    protected $primaryKey       = 'idjenisaktifitas';
    protected $allowedFields    = ['jenisaktifitas'];
}
