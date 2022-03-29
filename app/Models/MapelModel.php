<?php

namespace App\Models;

use CodeIgniter\Model;

class mapelModel extends Model
{
    protected $table      = 'mapel';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'deskripsi', 'mapel_kategori_id', 'mapel_type', 'is_active'];
}
