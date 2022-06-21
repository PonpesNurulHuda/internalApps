<?php

namespace App\Models;

use CodeIgniter\Model;


class TagihanDetailModel extends Model
{
    protected $table      = 'tagihan_detail';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_santri', 'id_tagihan', 'tanggal_pembuatan', 'tanggal_jatuh_tempo', 'tanggal_pembayaran', 'jumlah','id_pengurus', 'status'];

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
        return $this->db->table('tagihan_detail')
                ->join('santri', 'santri.id = tagihan_detail.id_santri')
                ->join('siswa_kelas', 'santri.id = siswa_kelas.id_siswa', 'left')
                ->join('kelas', 'kelas.id = siswa_kelas.id_kelas', 'left')
                ->join('santri as s2', 's2.id = tagihan_detail.id_pengurus', 'left')
                
                ->where('tagihan_detail.id_tagihan', $id)
                ->where('tagihan_detail.status', $status)
                
                ->select('
                    tagihan_detail.id,
                    tagihan_detail.jumlah,
                    tagihan_detail.tanggal_jatuh_tempo, 
                    tagihan_detail.tanggal_pembuatan, 
                    tagihan_detail.tanggal_pembayaran, 
                    tagihan_detail.status, 

                    santri.nama as santri, kelas.nama as kelas, s2.nama as bendahara
                ')->get()->getResultArray();
    }

}
