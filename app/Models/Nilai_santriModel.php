<?php

namespace App\Models;

use CodeIgniter\Model;

class nilai_santriModel extends Model
{
    protected $table      = 'nilai_santri';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_siswa_kelas', 'id_mapel_kelas', 'nilai'];
}
