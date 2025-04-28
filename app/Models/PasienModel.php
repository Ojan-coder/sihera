<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table            = 'tbl_pasien';

    protected $allowedFields    = [
        'id',
        'nik',
        'nama',
        'usia',
        'jenkel',
        'beratbadan',
        'tinggibadan',
        'alamat',
        'nohp',
        'tgllahir'
    ];

    public function generateKode()
    {
        $kode = $this->db->table('tbl_pasien')
            ->select('RIGHT(id,3) as kodesurat', false)
            ->orderBy('kodesurat', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        if (!empty($kode['kodesurat'])) {
            $no = $kode['kodesurat'] + 1;
        } else if (empty($kode['kodesurat'])) {
            $no = "1";
        }
        $huruf = "P";
        $tahun = date('dmY');
        $batas = str_pad($no, 3, "00", STR_PAD_LEFT);
        $kodeu = $huruf . $batas;
        return $kodeu;
    }
}
