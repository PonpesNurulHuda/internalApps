<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PresentModel extends Model{
    protected $table = 'present';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_santri', 'ruang', 'present_at'];
}