<?php

namespace App\Models;

use CodeIgniter\Model;

class tbl01Model extends Model
{
    protected $table      = 'tbl01';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['seqno', 'nama', 'is_active'];
}
