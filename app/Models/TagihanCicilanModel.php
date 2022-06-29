<?php

namespace App\Models;

use CodeIgniter\Model;

class TagihanCicilanModel extends Model
{
    protected $table      = 'tagihan_cicilan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tagihan_detail', 'jumlah', 'bendahara', 'update_at'];
    
}