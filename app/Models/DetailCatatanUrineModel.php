<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailCatatanUrineModel extends Model
{
    protected $table            = 'tbl_detail_catatan_urine';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'detail_idurine',
        'detail_idpasien',
        'detail_urinetanggal',
        'detail_urinevolume',
        'detail_urinewarna'
    ];
}
