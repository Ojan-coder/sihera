<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPembatasanCairanModel extends Model
{
    protected $table            = 'tbl_detail_pembatasan_cairan';
    protected $primaryKey       = 'iddetail';
    protected $allowedFields    = [
        'detail_idpembatasan',
        'detail_tanggal',
        'detail_pasien',
        'detail_asupanhari'
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

    public function getSumAsupanHari($idpasien)
    {
        $date = date('Y-m-d');
        $query = $this->db->table($this->table)
        ->selectSum('detail_asupanhari','asupan')
        ->where('detail_pasien',$idpasien)
        ->where('detail_tanggal',$date)
        ->groupBy('detail_idpembatasan')
        ->get()->getResultArray();
        return $query;
    }
}
