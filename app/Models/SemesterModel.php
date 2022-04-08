<?php

namespace App\Models;

use CodeIgniter\Model;

class semesterModel extends Model
{
    protected $table      = 'semester';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['tahun_ajaran_id', 'seqno', 'nama', 'dimulai', 'selesai', 'status'];

    public function DataSemesterDetail()
    {
        $db      = \Config\Database::connect();

        return $this->db->table('semester')
            ->join('tahun_ajaran', 'tahun_ajaran.id = semester.tahun_ajaran_id')

            ->select('semester.*, tahun_ajaran.nama as namaAjaran')
            ->get()->getResultArray();
    }
}
