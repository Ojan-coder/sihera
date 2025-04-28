<?php

namespace App\Models;

use CodeIgniter\Model;

class EdukasiModel extends Model
{
    protected $table            = 'tbl_edukasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'topik',
        'deskripsi',
        'sumber',
        'created_at',
        'updated_at',
    ];
}
