<?php

namespace App\Models;

use CodeIgniter\Model;

class nilai_santriModel extends Model
{
    protected $table      = 'nilai_santri';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_siswa_kelas', 'id_mapel_kelas', 'nilai'];

    public function DataNilai_santriDetail()
    {
        $db      = \Config\Database::connect();

        return $this->db->table('nilai_santri')
            ->join('siswa_kelas', 'siswa_kelas.id = nilai_santri.id_siswa_kelas')
            ->join('santri', 'santri.id = siswa_kelas.id_siswa')
            ->join('mapel_kelas', 'mapel_kelas.id = nilai_santri.id_mapel_kelas')

            ->select('nilai_santri.*, santri.nama as namaSiswa, mapel_kelas.nama namaMapel')
            ->get()->getResultArray();
    }
}
