<?php

namespace App\Models;

use CodeIgniter\Model;

class mapelModel extends Model
{
    protected $table      = 'mapel';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'deskripsi', 'mapel_kategori_id', 'mapel_type', 'nilai_minimal', 'wajib_lulus', 'is_active'];

    public function DataMapelDetail()
    {
        $db      = \Config\Database::connect();

        return $this->db->table('mapel')
            ->join('mapel_kategori', 'mapel_kategori.id = mapel.mapel_kategori_id')
            ->join('mapel_tipe', 'mapel_tipe.id = mapel.mapel_type')

            ->select('mapel.*, mapel_kategori.nama as namaKategory, mapel_tipe.nama namaType')
            ->get()->getResultArray();
    }
}
