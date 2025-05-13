<?php

namespace App\Models;

use CodeIgniter\Model;

class PembatasanCairanModel extends Model
{
    protected $table            = 'tbl_pembatasan_cairan';
    protected $primaryKey       = 'idpembatasan';
    protected $allowedFields    = [
        'idpembatasan',
        'idpasienpembatasan',
        'tglpembatasan',
        'targetmaksimal'
    ];

    public function generateKode()
    {
        $kode = $this->db->table('tbl_pembatasan_cairan')
            ->select('RIGHT(idpembatasan,3) as kodesurat', false)
            ->orderBy('kodesurat', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        if (!empty($kode['kodesurat'])) {
            $no = $kode['kodesurat'] + 1;
        } else if (empty($kode['kodesurat'])) {
            $no = "1";
        }
        $huruf = "PC";
        $tahun = date('dmY');
        $batas = str_pad($no, 3, "00", STR_PAD_LEFT);
        $kodeu = $huruf . $batas;
        return $kodeu;
    }

    public function getTargetMax($idpasien){
        $date = date('Y-m-d');
        $query = $this->db->table($this->table)
        ->select('targetmaksimal')
        ->where('idpasienpembatasan',$idpasien)
        ->where('tglpembatasan','2025-05-13')
        ->get()->getResultArray();
        return $query;
    }
}
