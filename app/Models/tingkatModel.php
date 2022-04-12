<?php

namespace App\Models;

use CodeIgniter\Model;

class TingkatModel extends Model
{
    protected $table      = 'tingkat';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['seqno', 'nama', 'is_active'];
}
