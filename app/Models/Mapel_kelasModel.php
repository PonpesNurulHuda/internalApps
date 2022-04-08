<?php

namespace App\Models;

use CodeIgniter\Model;

class mapel_kelasModel extends Model
{
    protected $table      = 'mapel_kelas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'kelas_id', 'semester_id', 'mapel_id', 'mustahiq', 'keterangan'];

    public function DataMapel_kelasDetail()
    {
        $db      = \Config\Database::connect();

        return $this->db->table('mapel_kelas')
            ->join('kelas', 'kelas.id = mapel_kelas.kelas_id')
            ->join('semester', 'semester.id = mapel_kelas.semester_id')
            ->join('mapel', 'mapel.id = mapel_kelas.mapel_id')

            ->select('mapel_kelas.*, kelas.nama as namaKelas, semester.nama namaSemester, mapel.nama as namaMapel')
            ->get()->getResultArray();
    }
}
