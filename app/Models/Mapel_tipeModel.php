<?php

namespace App\Models;

use CodeIgniter\Model;

class mapel_tipeModel extends Model
{
    protected $table      = 'mapel_tipe';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'deskripsi', 'is_active'];
}
