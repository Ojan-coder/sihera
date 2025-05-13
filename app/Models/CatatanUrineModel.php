<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanUrineModel extends Model
{
    protected $table            = 'tbl_catatan_urine';
    protected $primaryKey       = 'idurine';
    protected $allowedFields    = [
        'idurine',
        'urineidpasien',
        'urinetanggal',
        'created_at',
        'updated_at',
    ];

    public function generateKode()
    {
        $kode = $this->db->table('tbl_catatan_urine')
            ->select('RIGHT(idurine,3) as kodesurat', false)
            ->orderBy('kodesurat', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        if (!empty($kode['kodesurat'])) {
            $no = $kode['kodesurat'] + 1;
        } else if (empty($kode['kodesurat'])) {
            $no = "1";
        }
        $huruf = "UR";
        $tahun = date('dmY');
        $batas = str_pad($no, 3, "000", STR_PAD_LEFT);
        $kodeu = $huruf . $tahun . $batas;
        return $kodeu;
    }
    public function masterurine(){
        return $this->db->table('tbl_master_urine')->get()->getResultArray();
    }
}
