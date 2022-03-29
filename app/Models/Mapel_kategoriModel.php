<?php

namespace App\Models;

use CodeIgniter\Model;

class mapel_kategoriModel extends Model
{
    protected $table      = 'mapel_kategori';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'deskripsi', 'is_active'];
}
