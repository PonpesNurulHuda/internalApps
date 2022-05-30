<?php

namespace App\Models;

use CodeIgniter\Model;

class santriModel extends Model
{
    protected $table      = 'santri';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kk', 'nik', 'nis', 'nama', 'tanggal_lahir', 'gender', 'is_mustahiq' ];
}
