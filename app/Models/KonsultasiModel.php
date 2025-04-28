<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{
    protected $table            = 'tbl_konsultasi';
    protected $primaryKey       = 'idgroup';
    protected $allowedFields    = [
        'idgroup',
        'namagroup',
        'anggota',
        'topikdiskusi',
        'created_at',
        'updated_at',
    ];

    public function generateKode()
    {
        $kode = $this->db->table('tbl_konsultasi')
            ->select('RIGHT(idgroup,3) as kodesurat', false)
            ->orderBy('kodesurat', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        if (!empty($kode['kodesurat'])) {
            $no = $kode['kodesurat'] + 1;
        } else if (empty($kode['kodesurat'])) {
            $no = "1";
        }
        $huruf = "G";
        $tahun = date('dmY');
        $batas = str_pad($no, 3, "00", STR_PAD_LEFT);
        $kodeu = $huruf . $batas;
        return $kodeu;
    }
}
