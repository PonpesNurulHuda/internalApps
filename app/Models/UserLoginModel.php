<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class UserLoginModel extends Model{
    protected $table = 'users_login';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nis', 'password', 'gagal', 'updated_at','id_santri'];
}