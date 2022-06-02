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
            ->join('siswa_kelas', 'santri.id = siswa_kelas.id_siswa')
            ->join('kelas', 'kelas.id = siswa_kelas.id_kelas')
            ->select('tagihan_detail.*, santri.nama as santri, tagihan.nama as tagihan, kelas.nama as kelas')
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

}
