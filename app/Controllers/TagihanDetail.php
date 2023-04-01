<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\TagihanDetailModel;
use App\Models\TagihanCicilanModel;
use App\Models\TagihanModel;
use App\Models\SantriModel;
use App\Models\TagihanPeriodeModel;
use CodeIgniter\API\ResponseTrait;

class TagihanDetail extends BaseController 
{
    use ResponseTrait;
    private $db;  //This can be accessed by all class methods
    private $idLogin;

    public function __construct()
    {
        $session = session();
        $idLogin = $session->get('id');

        $kelas = new KelasModel();
        $tagihanDetail = new TagihanDetailModel();
        $tagihanCicilan = new TagihanCicilanModel();
        $tagihanPeriode = new TagihanPeriodeModel();
        $tagihan = new TagihanModel();
        $santri = new SantriModel();
        $this->idLogin = $idLogin;
        $this->db = [
            'kelas' => $kelas,
            'tagihanDetail' => $tagihanDetail,
            'tagihan' => $tagihan,
            'santri' => $santri,
            'tagihanCicilan' => $tagihanCicilan,
            'tagihanPeriode' => $tagihanPeriode
        ];
    }
    public function index()
    {
        $data['dtTagihanMaster'] = $this->db['tagihan']->getWhere(['is_active' => 1])->getResultArray();
        $data['dtKelas'] = $this->db['kelas']->KelasActive();
        $data['dtSantri'] = $this->db['santri']->GetSantriKelas();
        $data['dtTagihan'] = $this->db['tagihanDetail']->GetAllTagihan();
        $data['dtPeriode'] = $this->db['tagihanPeriode']->GetAll();
        
        return view('tagihanDetail', $data);
        }

    public function index2()
    {
        $data['dtTagihanMaster'] = $this->db['tagihan']->getWhere(['is_active' => 1])->getResultArray();
        $data['dtKelas'] = $this->db['kelas']->KelasActive();
        $data['dtSantri'] = $this->db['santri']->GetSantriKelas();
        $data['dtTagihan'] = $this->db['tagihanDetail']->GetAllTagihan();
        $data['dtPeriode'] = $this->db['tagihanPeriode']->GetAll();
        
        return view('tagihan/semuaTagihan', $data);
    }

    public function generate()
    {
        $kelas = $this->request->getPost('kelas');
        $id_tagihan = $this->request->getPost('id_tagihan');
        $id_periode = $this->request->getPost('id_periode');
        $jatuh_tempo = $this->request->getPost('jatuh_tempo');

        if($kelas != 0){
            $this->generateTagihanByClass($kelas, $id_tagihan, $jatuh_tempo,$id_periode);
        }else{
            $kelasActive = $this->db['kelas']->KelasActive();
            foreach($kelasActive as $a){
                $this->generateTagihanByClass($a['id'], $id_tagihan, $jatuh_tempo,$id_periode);
            }
        }

        $data = [
            'status' => 1,
            'pesan' => 'sukses',
        ];
        return $this->respond($data, 200);
    }

    public function add1Tagihan(){
        $id_santri = $this->request->getPost('id_santri');
        $id_tagihan = $this->request->getPost('id_tagihan');
        $jatuh_tempo = $this->request->getPost('jatuh_tempo');
        $id_periode = $this->request->getPost('id_periode');
        
        $this->addTagihan($id_santri, $id_tagihan, $jatuh_tempo, $id_periode);
        $data = [
            'status' => 1,
            'pesan' => 'sukses',
        ];
        return $this->respond($data, 200);
    }

    private function generateTagihanByClass($kelas, $id_tagihan, $jatuh_tempo, $id_periode){
        $dtSantri = $this->db['santri']->GetSantriKelasByKelas($kelas);
        foreach($dtSantri as $a){
            $this->addTagihan($a['id'],$id_tagihan, $jatuh_tempo, $id_periode);
        }
    }

    private function addTagihan($id_santri, $id_tagihan, $jatuh_tempo, $periode){
        $jumlah = $this->db['tagihan']->getTagihan($id_tagihan)[0]['jumlah'];

        $this->db['tagihanDetail']->insert([
            "id_santri" => $id_santri,
            "id_tagihan" => $id_tagihan,
            "tanggal_pembuatan" => date('Y-m-d'),
            "tanggal_jatuh_tempo" => $jatuh_tempo,
            "jumlah" => $jumlah,
            "status" => 0,
            "id_periode" => $periode
        ]);
    }

    public function terimaLunas()
    {
        $data = new TagihanDetailModel();
        $idTagihan = $this->request->getPost('id');
        $status = $this->request->getPost('status');
        
        $id = $data->update($idTagihan, [
            "status" => $this->request->getPost('status'),
            "tanggal_pembayaran" => date('Y-m-d H:i:s')
        ]);

        $this->db['tagihanCicilan']->insert([
            "id_tagihan_detail" => $this->request->getPost('id'),
            "jumlah" => $this->db['tagihanDetail']->where('id', $idTagihan)->get()->getResultArray()[0]['jumlah'],
            "bendahara" => $this->idLogin
        ]);

        if ($id > 0) {
            $data = [
                'id' => $id,
                'pesan' => 'data kelas tersimpan',
            ];
        }else{
            $data = [
                'id' => 0,
                'pesan' => 'Terjadi kesalahan, hubungi TIM IT',
            ];
        }
        return $this->respond($data, 200);
    }

    public function terimaCicilan(){
        $id = $this->request->getPost('id');
        $jumlah = $this->request->getPost('jumlah');        
        $jumlahTagihan = $this->db['tagihanDetail']->where('id', $id)->get()->getResultArray()[0]['jumlah'];
        $jumlagCicilan = $this->db['tagihanCicilan']->where('id_tagihan_detail',$id)->selectSum('jumlah')->get()->getResultArray()[0]['jumlah'];
        $jumlahPembayaran = $jumlah + $jumlagCicilan; 
        $idCicilan = 0;

        if($jumlahPembayaran < $jumlahTagihan || $jumlahPembayaran == $jumlahTagihan ){
            $idCicilan = $this->db['tagihanCicilan']->insert([
                "id_tagihan_detail" => $id,
                "jumlah" => $jumlah,
                "bendahara" => $this->idLogin
            ]);

            // update detail
            $jumlagCicilan = $this->db['tagihanCicilan']->where('id_tagihan_detail',$id)->selectSum('jumlah')->get()->getResultArray()[0]['jumlah'];

            if($jumlagCicilan == $jumlahTagihan){
                $updateTagihanDetail = $this->db['tagihanDetail']->update($id, [
                    "status" => 1,
                    "tanggal_pembayaran" => date('Y-m-d H:i:s')
                ]);
            }
        }

        if($idCicilan > 0){
            $data = [
                'id' => $id,
                'pesan' => 'data kelas tersimpan',
            ];
        }else{
            $data = [
                'id' => 0,
                'pesan' => 'Terjadi kesalahan'.'jumlah pembayaran '.$jumlahPembayaran." jumlah tagihan ".$jumlahTagihan,
            ];
        }

        return $this->respond($data, 200);
    }

    public function editJumlahTagihan(){
        $id = $this->request->getPost('id');
        $jmlTagihan = $this->request->getPost('jmlTagihan');        
        $this->db['tagihanDetail']->update($id, [
            "jumlah" => $jmlTagihan
        ]);

        $data = [
            'id' => $id,
            'pesan' => 'update tagihan berhasil',
        ];
        return $this->respond($data, 200);
    }

    public function test(){
        
        $data = $this->db['tagihanCicilan']->where('id_tagihan_detail',4669)->selectSum('jumlah')->get()->getResultArray()[0]['jumlah'];
        print_r($data);
    }

}
