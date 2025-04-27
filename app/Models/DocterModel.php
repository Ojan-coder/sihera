<?php

namespace App\Models;

use CodeIgniter\Model;

class DocterModel extends Model
{
    protected $table            = 'tbl_dokter';
    protected $primaryKey       = 'iddokter';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'iddokter',
        'namadokter',
        'tgllahirdokter',
        'alamatdokter',
        'gambardokter',
        'nohpdokter',
        'spesialisdokter',
    ];

    public function generateKode()
    {
        $kode = $this->db->table('tbl_dokter')
            ->select('RIGHT(iddokter,3) as kodesurat', false)
            ->orderBy('kodesurat', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        if (!empty($kode['kodesurat'])) {
            $no = $kode['kodesurat'] + 1;
        } else if (empty($kode['kodesurat'])) {
            $no = "1";
        }
        $huruf = "ID";
        $tahun = date('dmY');
        $batas = str_pad($no, 3, "000", STR_PAD_LEFT);
        $kodeu = $huruf . $tahun . $batas;
        return $kodeu;
    }
}
