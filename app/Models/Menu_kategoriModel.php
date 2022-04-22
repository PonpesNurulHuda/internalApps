<?php

namespace App\Models;

use CodeIgniter\Model;

class menu_kategoriModel extends Model
{
    protected $table      = 'menu_kategori';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'is_active'];
}
