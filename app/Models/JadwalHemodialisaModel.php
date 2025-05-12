<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalHemodialisaModel extends Model
{
    protected $table            = 'tbl_jadwal_hemodialisa';
    protected $primaryKey       = 'idjadwal';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'idjadwal',
        'idpasien',
        'jadwal',
        'waktu'
    ];

    public function generateKode()
    {
        $kode = $this->db->table('tbl_jadwal_hemodialisa')
            ->select('RIGHT(idjadwal,3) as kodesurat', false)
            ->orderBy('kodesurat', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        if (!empty($kode['kodesurat'])) {
            $no = $kode['kodesurat'] + 1;
        } else if (empty($kode['kodesurat'])) {
            $no = "1";
        }
        $huruf = "JH";
        $tahun = date('dmY');
        $batas = str_pad($no, 3, "000", STR_PAD_LEFT);
        $kodeu = $huruf . $tahun . $batas;
        return $kodeu;
    }

    public function getNotifikasi()
    {
        return $this->db->table($this->table)
                        ->get()
                        ->getResult(); // return data sebagai objek
    }
}
