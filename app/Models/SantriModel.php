<?php

namespace App\Models;

use CodeIgniter\Model;
use Illuminate\Support\Facades\DB;

class SantriModel extends Model
{
    protected $table      = 'santri';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kk', 'nik', 'nis', 'nama', 'tanggal_lahir', 'gender', 'is_mustahiq', 'no_hp1', 'no_hp2' ];

    public function GetSantriKelas()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('santri');
        $builder->select('santri.id, santri.nama, kelas.id as kelasId');
        $builder->join('siswa_kelas', 'santri.id = siswa_kelas.id_siswa', 'left');
        $builder->join('kelas', 'kelas.id = siswa_kelas.id_kelas', 'left');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function GetSantriKelasByKelas($idKelas)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('santri');
        $builder->select('santri.id');
        $builder->join('siswa_kelas', 'santri.id = siswa_kelas.id_siswa', 'left');
        $builder->where('siswa_kelas.id_kelas', $idKelas);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function getJabatanSantri($idSantri)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('santri');
        $builder->select('santri.id, jabatan.id as jabatan');
        $builder->join('santri_jabatan sj', 'sj.id_santri = santri.id', 'left');
        $builder->where('santri.id', $idSantri);
        $query = $builder->get()->getResultArray();

        return $query;
    }
}