<?php

namespace App\Models;

use CodeIgniter\Model;

class semesterModel extends Model
{
    protected $table      = 'semester';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['tahun_ajaran_id', 'seqno', 'nama', 'dimulai', 'selesai', 'status'];
}
