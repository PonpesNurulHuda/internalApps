<?php

namespace App\Models;

use CodeIgniter\Model;

class SantriModel extends Model
{
    protected $table      = 'santri';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kk', 'nik', 'nis', 'nana', 'tanggal_lahir', 'gender'];
}