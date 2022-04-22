<?php

namespace App\Models;

use CodeIgniter\Model;

class menuModel extends Model
{
    protected $table      = 'menu';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'icon', 'app_controller', 'app_funciton', 'is_have_child', 'related_id', 'is_active, seqno, menu_kategori'];
}
