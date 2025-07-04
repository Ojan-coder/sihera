<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailCatatanDietModel extends Model
{
    protected $table            = 'tbl_detail_catatan_diet';
    protected $primaryKey       = 'iddetail';
    protected $allowedFields    = [
        'detail_iddiet',
        'detail_idpasien',
        'detail_diettanggal',
        'detail_keluhan',
        'detail_porsi',
    ];
}