<?php

namespace App\Models;

use CodeIgniter\Model;

class AktifitasFisikModel extends Model
{
    protected $table            = 'tbl_aktifitas_fisik';
    protected $primaryKey       = 'idaktifitas';
    protected $allowedFields    = [
        'idaktifitas',
        'fisikidpasien',
        'fisiktanggal',
        'fisikjenisaktifitas',
        'fisikdurasi',
        'created_at',
        'updated_at'
    ];

    public function generateKode()
    {
        $kode = $this->db->table('tbl_aktifitas_fisik')
            ->select('RIGHT(idaktifitas,3) as kodesurat', false)
            ->orderBy('kodesurat', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        if (!empty($kode['kodesurat'])) {
            $no = $kode['kodesurat'] + 1;
        } else if (empty($kode['kodesurat'])) {
            $no = "1";
        }
        $huruf = "AF";
        $tahun = date('dmY');
        $batas = str_pad($no, 3, "00", STR_PAD_LEFT);
        $kodeu = $huruf . $batas;
        return $kodeu;
    }
}
