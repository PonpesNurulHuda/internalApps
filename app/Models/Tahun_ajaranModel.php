<?php

namespace App\Models;

use CodeIgniter\Model;

class tahun_ajaranModel extends Model
{
    protected $table      = 'tahun_ajaran';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'status', 'is_active'];
}
