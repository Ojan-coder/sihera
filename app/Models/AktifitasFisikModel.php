<?php

namespace App\Models;

use CodeIgniter\Model;

class AktifitasFisikModel extends Model
{
    protected $table            = 'tbl_aktifitas_fisik';
    protected $allowedFields    = [
        'fisikidpasien',
        'fisikjenisaktifitas',
        'fisikdurasi',
        'created_at',
        'updated_at'
    ];
}
