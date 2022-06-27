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

    public function rekap(){
        $db      = \Config\Database::connect();
        $query = "
                select a.id, a.nama, a.L, concat(MONTHNAME(b.tanggal_jatuh_tempo), year(b.tanggal_jatuh_tempo)) as Periode, b.H,b.H/(a.L+b.H) * 100 as persen, b.jumlah from (
                    select 
                        t.id,
                        t.nama,
                        COUNT(tdL.id) as L,
                        tdL.tanggal_jatuh_tempo
                    from 
                        tagihan t
                        left join tagihan_detail tdL on t.id = tdL.id_tagihan and tdL.status = 1
                    group by 
                        t.id,
                        t.nama,
                        tdL.tanggal_jatuh_tempo
                    ) a 
                    
                    inner join (
                        select 
                            t.id,
                            t.nama,
                            COUNT(tdL.id) as H,
                            sum(tdL.jumlah) as jumlah,
                            tdL.tanggal_jatuh_tempo
                        from 
                            tagihan t
                            left join tagihan_detail tdL on t.id = tdL.id_tagihan and tdL.status = 0
                        group by 
                            t.id,
                            t.nama,
                            tdL.tanggal_jatuh_tempo
                    ) b on a.id = b.id
                where b.H > 0
                order by b.tanggal_jatuh_tempo
        ";
        $query=$this->db->query($query);
        return $query->getResultArray();
    }
}