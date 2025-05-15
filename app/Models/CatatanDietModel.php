<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanDietModel extends Model
{
    protected $table            = 'tbl_catatan_diet';
    protected $primaryKey       = 'iddiet';
    protected $allowedFields    = [
        'iddiet',
        'dietidpasien',
        'diettanggal',
        'dietprogram',
        'created_at',
        'updated_at'
    ];

    public function generateKode()
    {
        $kode = $this->db->table('tbl_catatan_diet')
            ->select('RIGHT(iddiet,3) as kodesurat', false)
            ->orderBy('kodesurat', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        if (!empty($kode['kodesurat'])) {
            $no = $kode['kodesurat'] + 1;
        } else if (empty($kode['kodesurat'])) {
            $no = "1";
        }
        $huruf = "D";
        $tahun = date('dmY');
        $batas = str_pad($no, 3, "00", STR_PAD_LEFT);
        $kodeu = $huruf . $batas;
        return $kodeu;
    }

    public function getMasterMakanan()
    {
        return $this->db->table('tbl_master_makanan')->get()->getResultArray();
    }
    public function getProgramDiet(){
        return $this->db->table('tbl_master_diet')->get()->getResultArray();
    }
}