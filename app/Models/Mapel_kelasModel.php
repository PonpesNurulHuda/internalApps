<?php

namespace App\Models;

use CodeIgniter\Model;

class mapel_kelasModel extends Model
{
    protected $table      = 'mapel_kelas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'kelas_id', 'semester_id', 'mapel_id', 'mustahiq', 'keterangan'];
}
