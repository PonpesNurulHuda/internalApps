<?php

namespace App\Models;

use CodeIgniter\Model;

class TagihanModel extends Model
{
    protected $table      = 'tagihan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'description', 'jumlah', 'is_active'];
    
    public function getTagihan($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('tagihan');
        $builder->select('jumlah');
        $builder->where('id', $id);
        $query = $builder->get()->getResultArray();
        return $query; 
    }
}
