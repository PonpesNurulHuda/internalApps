<?php

namespace App\Models;

use CodeIgniter\Model;

class nilai_akhlaq_santriModel extends Model
{
    protected $table      = 'nilai_akhlaq_santri';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_santri', 'id_semester', 'akhlaq', 'kerapihan', 'kerajinan'];
}
