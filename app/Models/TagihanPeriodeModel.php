<?php

namespace App\Models;

use CodeIgniter\Model;

class TagihanPeriodeModel extends Model
{
    protected $table      = 'tagihan_periode';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tagihan','nama', 'jatuh_tempo', 'is_active'];

    public function GetAll()
    {
        $db      = \Config\Database::connect();

        return $this->db->table('tagihan_periode')
            ->join('tagihan', 'tagihan.id = tagihan_periode.id_tagihan')
            ->select('tagihan_periode.*, tagihan.nama as namaTagihan')
            ->get()->getResultArray();
    }
}

    