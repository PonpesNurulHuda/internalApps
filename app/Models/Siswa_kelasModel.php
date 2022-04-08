<?php

namespace App\Models;

use CodeIgniter\Model;

class siswa_kelasModel extends Model
{
    protected $table      = 'siswa_kelas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_siswa', 'id_kelas', 'is_active', 'created_at', 'updated_at'];

    public function DataSiswa_kelasDetail()
    {
        $db      = \Config\Database::connect();

        return $this->db->table('siswa_kelas')
            ->join('santri', 'santri.id = siswa_kelas.id_siswa')
            ->join('kelas', 'kelas.id = siswa_kelas.id_kelas')

            ->select('siswa_kelas.*, santri.nama as namaSiswa, kelas.nama namaKelas')
            ->get()->getResultArray();
    }
}
