<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanBBModel extends Model
{
    protected $table            = 'tbl_catatan_bb';
    protected $primaryKey       = 'idbb';
    protected $allowedFields    = [
        'idbb',
        'bbpasien',
        'bbsebelumhd',
        'bbsesudahhd',
        'created_at',
        'updated_at',
    ];

    public function generateKode()
    {
        $kode = $this->db->table('tbl_catatan_bb')
            ->select('RIGHT(idbb,3) as kodesurat', false)
            ->orderBy('kodesurat', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        if (!empty($kode['kodesurat'])) {
            $no = $kode['kodesurat'] + 1;
        } else if (empty($kode['kodesurat'])) {
            $no = "1";
        }
        $huruf = "BB";
        $tahun = date('dmY');
        $batas = str_pad($no, 3, "00", STR_PAD_LEFT);
        $kodeu = $huruf . $batas;
        return $kodeu;
    }
}
