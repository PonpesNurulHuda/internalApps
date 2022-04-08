<?php

namespace App\Models;

use CodeIgniter\Model;

class Nilai_akhlaq_santriModel extends Model
{
    protected $table      = 'nilai_akhlaq_santri';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_santri', 'id_semester', 'akhlaq', 'kerapihan', 'kerajinan'];

    public function DataNilai_akhlaq_santriDetail()
    {
        $db      = \Config\Database::connect();

        return $this->db->table('nilai_akhlaq_santri')
            ->join('santri', 'santri.id = nilai_akhlaq_santri.id_santri')
            ->join('semester', 'semester.id = nilai_akhlaq_santri.id_semester')

            ->select('nilai_akhlaq_santri.*, santri.nama as namaSantri, semester.nama namaSemester')
            ->get()->getResultArray();
    }
}
