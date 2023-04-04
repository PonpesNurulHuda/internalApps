<?php

namespace App\Models;

use CodeIgniter\Model;


class TagihanDetailModel extends Model
{
    protected $table      = 'tagihan_detail';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_santri', 'id_tagihan', 'tanggal_pembuatan', 'tanggal_jatuh_tempo', 'tanggal_pembayaran', 'jumlah','id_pengurus', 'status', 'id_periode'];

    public function GetAllTagihan()
    {
        $db      = \Config\Database::connect();

        return $this->db->table('tagihan_detail')
            ->join('tagihan', 'tagihan.id = tagihan_detail.id_tagihan')
            ->join('santri', 'santri.id = tagihan_detail.id_santri')
            ->join('siswa_kelas', 'santri.id = siswa_kelas.id_siswa', 'left')
            ->join('kelas', 'kelas.id = siswa_kelas.id_kelas', 'left')
            ->join('santri as s2', 's2.id = tagihan_detail.id_pengurus', 'left')
            ->select('tagihan_detail.*, santri.nama as santri, tagihan.nama as tagihan, kelas.nama as kelas, s2.nama as bendahara')
            ->get()->getResultArray();
    }

    public function CekTagihan($id, $status)
    {
        $db      = \Config\Database::connect();
        return $this->db->table('tagihan_detail')
            ->where('id', $id)
            ->where('status','!=', $status)
            ->get()->getRowArray();
    }

    public function rekapPerTagihan($id, $status)
    {
        $db      = \Config\Database::connect();
        $data = $this->db->table('tagihan_detail')
                ->join('santri', 'santri.id = tagihan_detail.id_santri')
                ->join('siswa_kelas', 'santri.id = siswa_kelas.id_siswa', 'left')
                ->join('kelas', 'kelas.id = siswa_kelas.id_kelas', 'left')
                ->join('santri as s2', 's2.id = tagihan_detail.id_pengurus', 'left')
                ->select('
                    tagihan_detail.id,
                    tagihan_detail.jumlah,
                    tagihan_detail.tanggal_jatuh_tempo, 
                    tagihan_detail.tanggal_pembuatan, 
                    tagihan_detail.tanggal_pembayaran, 
                    tagihan_detail.status, 
                    santri.nama as santri, kelas.nama as kelas, s2.nama as bendahara
                ');
        if($id != 0){
            $data = $data->where('tagihan_detail.id_tagihan', $id);
        }

        if($status != "all"){
            $data = $data->where('tagihan_detail.status', $status);
        }

        return $data->get()->getResultArray(); 
    }

    public function rekapPerBulan($tahun)
    {
        $db      = \Config\Database::connect();
        $query = '
        SELECT *, Jan+Feb+Mar+Apr+Mei+Jun+Jul+Ags+Okt+Nov+Des as Total FROM (
            SELECT  
                s.id, s.nama
                , (
                    SELECT IFNULL(SUM(td.jumlah),0) - IFNULL(SUM(tc.jumlah),0) as jml  
                    FROM 
                        tagihan_detail td 
                        LEFT JOIN tagihan_cicilan tc on td.id = tc.id_tagihan_detail 
                    WHERE 
                        td.id_santri = s.id 
                        AND YEAR(td.tanggal_jatuh_tempo) = 2023
                        AND MONTH(td.tanggal_jatuh_tempo) = 1 
                ) as Jan
                , (
                    SELECT IFNULL(SUM(td.jumlah),0) - IFNULL(SUM(tc.jumlah),0) as jml  
                    FROM 
                        tagihan_detail td 
                        LEFT JOIN tagihan_cicilan tc on td.id = tc.id_tagihan_detail 
                    WHERE 
                        td.id_santri = s.id 
                        AND YEAR(td.tanggal_jatuh_tempo) = 2023
                        AND MONTH(td.tanggal_jatuh_tempo) = 2 
                ) as Feb
                , (
                    SELECT IFNULL(SUM(td.jumlah),0) - IFNULL(SUM(tc.jumlah),0) as jml  
                    FROM 
                        tagihan_detail td 
                        LEFT JOIN tagihan_cicilan tc on td.id = tc.id_tagihan_detail 
                    WHERE 
                        td.id_santri = s.id 
                        AND YEAR(td.tanggal_jatuh_tempo) = 2023
                        AND MONTH(td.tanggal_jatuh_tempo) = 3 
                ) as Mar
                , (
                    SELECT IFNULL(SUM(td.jumlah),0) - IFNULL(SUM(tc.jumlah),0) as jml  
                    FROM 
                        tagihan_detail td 
                        LEFT JOIN tagihan_cicilan tc on td.id = tc.id_tagihan_detail 
                    WHERE 
                        td.id_santri = s.id 
                        AND YEAR(td.tanggal_jatuh_tempo) = 2023
                        AND MONTH(td.tanggal_jatuh_tempo) = 4
                ) as Apr
                , (
                    SELECT IFNULL(SUM(td.jumlah),0) - IFNULL(SUM(tc.jumlah),0) as jml  
                    FROM 
                        tagihan_detail td 
                        LEFT JOIN tagihan_cicilan tc on td.id = tc.id_tagihan_detail 
                    WHERE 
                        td.id_santri = s.id 
                        AND YEAR(td.tanggal_jatuh_tempo) = 2023
                        AND MONTH(td.tanggal_jatuh_tempo) = 5 
                ) as Mei
                , (
                    SELECT IFNULL(SUM(td.jumlah),0) - IFNULL(SUM(tc.jumlah),0) as jml  
                    FROM 
                        tagihan_detail td 
                        LEFT JOIN tagihan_cicilan tc on td.id = tc.id_tagihan_detail 
                    WHERE 
                        td.id_santri = s.id 
                        AND YEAR(td.tanggal_jatuh_tempo) = 2023
                        AND MONTH(td.tanggal_jatuh_tempo) = 6 
                ) as Jun
                , (
                    SELECT IFNULL(SUM(td.jumlah),0) - IFNULL(SUM(tc.jumlah),0) as jml  
                    FROM 
                        tagihan_detail td 
                        LEFT JOIN tagihan_cicilan tc on td.id = tc.id_tagihan_detail 
                    WHERE 
                        td.id_santri = s.id 
                        AND YEAR(td.tanggal_jatuh_tempo) = 2023
                        AND MONTH(td.tanggal_jatuh_tempo) = 7 
                ) as Jul
                , (
                    SELECT IFNULL(SUM(td.jumlah),0) - IFNULL(SUM(tc.jumlah),0) as jml  
                    FROM 
                        tagihan_detail td 
                        LEFT JOIN tagihan_cicilan tc on td.id = tc.id_tagihan_detail 
                    WHERE 
                        td.id_santri = s.id 
                        AND YEAR(td.tanggal_jatuh_tempo) = 2023
                        AND MONTH(td.tanggal_jatuh_tempo) = 8 
                ) as Ags
                , (
                    SELECT IFNULL(SUM(td.jumlah),0) - IFNULL(SUM(tc.jumlah),0) as jml  
                    FROM 
                        tagihan_detail td 
                        LEFT JOIN tagihan_cicilan tc on td.id = tc.id_tagihan_detail 
                    WHERE 
                        td.id_santri = s.id 
                        AND YEAR(td.tanggal_jatuh_tempo) = 2023
                        AND MONTH(td.tanggal_jatuh_tempo) = 9 
                ) as Sep
                , (
                    SELECT IFNULL(SUM(td.jumlah),0) - IFNULL(SUM(tc.jumlah),0) as jml  
                    FROM 
                        tagihan_detail td 
                        LEFT JOIN tagihan_cicilan tc on td.id = tc.id_tagihan_detail 
                    WHERE 
                        td.id_santri = s.id 
                        AND YEAR(td.tanggal_jatuh_tempo) = 2023
                        AND MONTH(td.tanggal_jatuh_tempo) = 10
                ) as Okt
                , (
                    SELECT IFNULL(SUM(td.jumlah),0) - IFNULL(SUM(tc.jumlah),0) as jml  
                    FROM 
                        tagihan_detail td 
                        LEFT JOIN tagihan_cicilan tc on td.id = tc.id_tagihan_detail 
                    WHERE 
                        td.id_santri = s.id 
                        AND YEAR(td.tanggal_jatuh_tempo) = 2023
                        AND MONTH(td.tanggal_jatuh_tempo) = 11 
                ) as Nov
                , (
                    SELECT IFNULL(SUM(td.jumlah),0) - IFNULL(SUM(tc.jumlah),0) as jml  
                    FROM 
                        tagihan_detail td 
                        LEFT JOIN tagihan_cicilan tc on td.id = tc.id_tagihan_detail 
                    WHERE 
                        td.id_santri = s.id 
                        AND YEAR(td.tanggal_jatuh_tempo) = 2023
                        AND MONTH(td.tanggal_jatuh_tempo) = 12 
                ) as Des
            
            FROM 
                santri s 
        ) a        
        ';
        return $db->query($query)->getResultArray();
    }

    public function rekapPerSantri()
    {
        $db      = \Config\Database::connect();
        $query = 
        'select 
            s.id, 
            s.nama,
            t.nama as namaTagihan,
            tp.nama as periode,
            td.jumlah,
            IFNULL(sum(tc.jumlah),0) as jumlahCicilan,
            td.jumlah-IFNULL(sum(tc.jumlah),0) as total
        from santri s 
        left join tagihan_detail td on td.id_santri = s.id 
        left join tagihan t on t.id = td.id_tagihan
        left join tagihan_periode tp on tp.id = td.id_periode 
        left join tagihan_cicilan tc on tc.id_tagihan_detail = td.id 
        where 
            td.jumlah is not null
            and td.status = 0
        group by 
            s.id, 
            s.nama,
            t.nama,
            tp.nama,
            td.jumlah,
            td.tanggal_jatuh_tempo

        order by 
            s.nama, 
            td.tanggal_jatuh_tempo
        ';
        return $db->query($query)->getResultArray();
    }

    public function SumPerSantri()
    {
        $db      = \Config\Database::connect();
        $query = 
        '
        select 
            s.id, 
            s.nama,
            IFNULL(sum(td.jumlah),0) - IFNULL(sum(tc.jumlah),0)  as jumlahTagihan,
            sk.id_kelas
        from santri s 
        left join siswa_kelas sk on sk.id_siswa = s.id and sk.is_active = 1
        left join tagihan_detail td on td.id_santri = s.id 
        left join tagihan t on t.id = td.id_tagihan
        left join tagihan_cicilan tc on tc.id_tagihan_detail = td.id 
        group by 
            s.id, 
            s.nama,
            sk.id_kelas
        order by s.nama
        ';
        return $db->query($query)->getResultArray();
    }

    

    public function rekapPerTagihanCustom($idKelas, $idTagihan, $statusPenerimaaan, $idSantri)
    {
        $arr = array();
        if($idKelas != 0){
            $arr += array('siswa_kelas.id_kelas' => $idKelas);
        }
        if($idTagihan != 0){
            $arr += array('tagihan_detail.id_tagihan' => $idTagihan);
        }
        if($statusPenerimaaan != "all"){
            $arr += array('tagihan_detail.status' => $statusPenerimaaan);
        }
        if($idSantri != "all"){
            $arr += array('santri.id' => $idSantri);
        }
        
        //$array = ['tagihan_detail.id_tagihan' => $idTagihan, 'title' => $title, 'status' => $status];

        $db      = \Config\Database::connect();
        return $this->db->table('tagihan_detail')
                ->join('santri', 'santri.id = tagihan_detail.id_santri', 'left')
                ->join('tagihan', 'tagihan_detail.id_tagihan = tagihan.id', 'left')
                ->join('siswa_kelas', 'santri.id = siswa_kelas.id_siswa', 'left')
                ->join('kelas', 'kelas.id = siswa_kelas.id_kelas', 'left')
                ->join('tagihan_cicilan', 'tagihan_detail.id = tagihan_cicilan.id_tagihan_detail', 'left')
                ->join('tagihan_periode', 'tagihan_periode.id = tagihan_detail.id_periode', 'left')
                //->join('santri as s2', 's2.id = tagihan_detail.id_pengurus', 'left')
                ->where($arr)
                ->select('
                    tagihan_detail.id,
                    tagihan_detail.jumlah jmlTagihan,
                    tagihan_detail.tanggal_jatuh_tempo, 
                    tagihan_detail.tanggal_pembuatan, 
                    tagihan_detail.tanggal_pembayaran, 
                    tagihan_detail.status, 
                    tagihan.nama as namaTagihan, 
                    tagihan_periode.nama as namaPeriode, 
                    santri.nama as santri, kelas.nama as kelas
                ')
                ->selectSum('tagihan_cicilan.jumlah')
                ->groupBy([
                    'tagihan_detail.id',
                    'tagihan_detail.tanggal_pembayaran',
                    'tagihan_detail.status',
                    'tagihan.nama', 
                    'kelas.nama', 
                    'tagihan_detail.tanggal_pembuatan', 
                    'tagihan_detail.jumlah', 
                    'tagihan_periode.nama', 
                    'tagihan_detail.tanggal_jatuh_tempo'
                ])
                ->orderBy('santri.nama', 'asc')
                ->orderBy('tagihan_detail.tanggal_jatuh_tempo', 'asc')
                ->get()->getResultArray();
    }

}
