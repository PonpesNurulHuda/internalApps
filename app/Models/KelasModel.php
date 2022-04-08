<?php

namespace App\Models;

use CodeIgniter\Model;

class kelasModel extends Model
{
    protected $table      = 'kelas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode', 'nama', 'tingkat_id', 'tahun_ajaran_id', 'walikelas', 'is_active', 'created_at', 'updated_at'];

    public function DataKelasDetail()
    {
        $db      = \Config\Database::connect();

        return $this->db->table('kelas')
            ->join('tingkat', 'tingkat.id = kelas.tingkat_id')
            ->join('tahun_ajaran', 'tahun_ajaran.id = kelas.tahun_ajaran_id')

            ->select('kelas.*, tingkat.nama as namaTingkat, tahun_ajaran.nama namaAjaran')
            ->get()->getResultArray();
    }
}
