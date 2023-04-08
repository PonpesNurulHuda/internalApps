<?php

namespace App\Models;

use CodeIgniter\Model;
use Illuminate\Support\Facades\DB;

class TingkatKelasModel extends Model
{
    protected $table      = 'tingkat';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['seqno', 'nama', 'is_active'];
}
