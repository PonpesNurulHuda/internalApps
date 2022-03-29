<?php

namespace App\Models;

use CodeIgniter\Model;

class kelasModel extends Model
{
    protected $table      = 'kelas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode', 'nama', 'tingkat_id', 'tahun_ajaran_id', 'walikelas', 'is_active', 'created_at', 'updated_at'];
}
