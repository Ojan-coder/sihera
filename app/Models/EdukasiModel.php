<?php

namespace App\Models;

use CodeIgniter\Model;

class EdukasiModel extends Model
{
    protected $table            = 'tbl_edukasi';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'topik',
        'deskripsi',
        'kategori',
        'sumber',
        'created_at',
        'updated_at',
    ];
}
