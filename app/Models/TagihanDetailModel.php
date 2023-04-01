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
        select 
            s.id, s.nama, 
            IFNULL(SUM(td1.jumlah),0) - IFNULL(SUM(tc1.jumlah),0) as Jan,
            IFNULL(SUM(td2.jumlah),0) - IFNULL(SUM(tc2.jumlah),0) as Feb,
            IFNULL(SUM(td3.jumlah),0) - IFNULL(SUM(tc3.jumlah),0) as Mar,
            IFNULL(SUM(td4.jumlah),0) - IFNULL(SUM(tc4.jumlah),0) as Apr,
            IFNULL(SUM(td5.jumlah),0) - IFNULL(SUM(tc5.jumlah),0) as Mei,
            IFNULL(SUM(td6.jumlah),0) - IFNULL(SUM(tc6.jumlah),0) as Jun,
            IFNULL(SUM(td7.jumlah),0) - IFNULL(SUM(tc7.jumlah),0) as Jul,
            IFNULL(SUM(td8.jumlah),0) - IFNULL(SUM(tc8.jumlah),0) as Ags,
            IFNULL(SUM(td9.jumlah),0) - IFNULL(SUM(tc9.jumlah),0) as Sep,
            IFNULL(SUM(td10.jumlah),0) - IFNULL(SUM(tc10.jumlah),0) as Okt,
            IFNULL(SUM(td11.jumlah),0) - IFNULL(SUM(tc11.jumlah),0) as Nov,
            IFNULL(SUM(td12.jumlah),0) - IFNULL(SUM(tc12.jumlah),0) as Des
        from 
        santri s 
        left join tagihan_detail td1 on 
            s.id = td1.id_santri 
            AND MONTH(td1.tanggal_jatuh_tempo) = 1
            AND YEAR(td1.tanggal_jatuh_tempo) = 2023 
            AND td1.status = 0
        left join tagihan_cicilan tc1 on td1.id_tagihan = tc1.id_tagihan_detail 
        
        left join tagihan_detail td2 on 
            s.id = td2.id_santri 
            and MONTH(td2.tanggal_jatuh_tempo) = 2 
            AND YEAR(td2.tanggal_jatuh_tempo) = 2023 
            and td2.status = 0
        left join tagihan_cicilan tc2 on td2.id_tagihan = tc2.id_tagihan_detail
        
        left join tagihan_detail td3 on s.id = td3.id_santri 
            and MONTH(td3.tanggal_jatuh_tempo) = 3 
            AND YEAR(td3.tanggal_jatuh_tempo) = 2023 
            and td3.status = 0
        left join tagihan_cicilan tc3 on td3.id_tagihan = tc3.id_tagihan_detail
        
        left join tagihan_detail td4 on 
            s.id = td4.id_santri 
            and MONTH(td4.tanggal_jatuh_tempo) = 4
            AND YEAR(td4.tanggal_jatuh_tempo) = 2023 
            and td4.status = 0
        left join tagihan_cicilan tc4 on td4.id_tagihan = tc4.id_tagihan_detail
        
        left join tagihan_detail td5 on 
            s.id = td5.id_santri 
            and MONTH(td5.tanggal_jatuh_tempo) = 5
            AND YEAR(td5.tanggal_jatuh_tempo) = 2023 
            and td2.status = 0
        left join tagihan_cicilan tc5 on td5.id_tagihan = tc5.id_tagihan_detail
        
        left join tagihan_detail td6 on 
            s.id = td6.id_santri 
            and MONTH(td6.tanggal_jatuh_tempo) = 6 
            AND YEAR(td6.tanggal_jatuh_tempo) = 2023 
            and td2.status = 0
        left join tagihan_cicilan tc6 on td6.id_tagihan = tc6.id_tagihan_detail
        
        left join tagihan_detail td7 on 
            s.id = td7.id_santri 
            and MONTH(td7.tanggal_jatuh_tempo) = 7
            AND YEAR(td7.tanggal_jatuh_tempo) = 2023 
            and td7.status = 0
        left join tagihan_cicilan tc7 on td7.id_tagihan = tc7.id_tagihan_detail
        
        left join tagihan_detail td8 on 
            s.id = td8.id_santri 
            and MONTH(td8.tanggal_jatuh_tempo) = 8 
            AND YEAR(td8.tanggal_jatuh_tempo) = 2023 
            and td8.status = 0
        left join tagihan_cicilan tc8 on td8.id_tagihan = tc8.id_tagihan_detail
        
        left join tagihan_detail td9 on 
            s.id = td9.id_santri 
            and MONTH(td9.tanggal_jatuh_tempo) = 9
            AND YEAR(td9.tanggal_jatuh_tempo) = 2023 
            and td9.status = 0
        left join tagihan_cicilan tc9 on td9.id_tagihan = tc9.id_tagihan_detail
        
        left join tagihan_detail td10 on 
            s.id = td10.id_santri 
            and MONTH(td10.tanggal_jatuh_tempo) = 10 
            AND YEAR(td10.tanggal_jatuh_tempo) = 2023 
            and td10.status = 0
        left join tagihan_cicilan tc10 on td10.id_tagihan = tc10.id_tagihan_detail
        
        left join tagihan_detail td11 on 
            s.id = td11.id_santri 
            and MONTH(td11.tanggal_jatuh_tempo) = 11 
            AND YEAR(td11.tanggal_jatuh_tempo) = 2023 
            and td11.status = 0
        left join tagihan_cicilan tc11 on td11.id_tagihan = tc11.id_tagihan_detail
        
        left join tagihan_detail td12 on 
            s.id = td12.id_santri 
            and MONTH(td12.tanggal_jatuh_tempo) = 12
            AND YEAR(td12.tanggal_jatuh_tempo) = 2023 
            and td12.status = 0
        left join tagihan_cicilan tc12 on td12.id_tagihan = tc12.id_tagihan_detail
        group by 
            s.id, s.nama
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
                ->get()->getResultArray();
    }

}
