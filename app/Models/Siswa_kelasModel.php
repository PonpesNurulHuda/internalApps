<?php

namespace App\Models;

use CodeIgniter\Model;

class siswa_kelasModel extends Model
{
    protected $table      = 'siswa_kelas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_siswa', 'id_kelas', 'is_active', 'created_at', 'updated_at'];
}
