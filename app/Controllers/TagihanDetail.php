<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\TagihanDetailModel;
use App\Models\TagihanModel;
use App\Models\SantriModel;
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
        $tagihan = new TagihanModel();
        $santri = new SantriModel();
        $this->idLogin = $idLogin;
        $this->db = [
            'kelas' => $kelas,
            'tagihanDetail' => $tagihanDetail,
            'tagihan' => $tagihan,
            'santri' => $santri,
        ];
    }
    public function index()
    {
        $data['dtTagihanMaster'] = $this->db['tagihan']->getWhere(['is_active' => 1])->getResultArray();
        $data['dtKelas'] = $this->db['kelas']->KelasActive();
        $data['dtSantri'] = $this->db['santri']->GetSantriKelas();
        $data['dtTagihan'] = $this->db['tagihanDetail']->GetAllTagihan();
        
        return view('tagihanDetail', $data);
    }

    public function index2()
    {
        $data['dtTagihanMaster'] = $this->db['tagihan']->getWhere(['is_active' => 1])->getResultArray();
        $data['dtKelas'] = $this->db['kelas']->KelasActive();
        $data['dtSantri'] = $this->db['santri']->GetSantriKelas();
        $data['dtTagihan'] = $this->db['tagihanDetail']->GetAllTagihan();
        
        return view('tagihan/semuaTagihan', $data);
    }

    public function generate()
    {
        $kelas = $this->request->getPost('kelas');
        $id_tagihan = $this->request->getPost('id_tagihan');
        $jatuh_tempo = $this->request->getPost('jatuh_tempo');

        if($kelas != 0){
            $this->generateTagihanByClass($kelas, $id_tagihan, $jatuh_tempo);
        }else{
            $kelasActive = $this->db['kelas']->KelasActive();
            foreach($kelasActive as $a){
                $this->generateTagihanByClass($a['id'], $id_tagihan, $jatuh_tempo);
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
        $this->addTagihan($id_santri, $id_tagihan, $jatuh_tempo);
        $data = [
            'status' => 1,
            'pesan' => 'sukses',
        ];
        return $this->respond($data, 200);
    }

    private function generateTagihanByClass($kelas, $id_tagihan, $jatuh_tempo){
        $dtSantri = $this->db['santri']->GetSantriKelasByKelas($kelas);
        foreach($dtSantri as $a){
            $this->addTagihan($a['id'],$id_tagihan, $jatuh_tempo);
        }
    }

    private function addTagihan($id_santri, $id_tagihan, $jatuh_tempo){
        $jumlah = $this->db['tagihan']->getTagihan($id_tagihan)[0]['jumlah'];

        $this->db['tagihanDetail']->insert([
            "id_santri" => $id_santri,
            "id_tagihan" => $id_tagihan,
            "tanggal_pembuatan" => date('Y-m-d'),
            "tanggal_jatuh_tempo" => $jatuh_tempo,
            "jumlah" => $jumlah,
            "status" => 0
        ]);
    }

    public function update()
    {
        $data = new TagihanDetailModel();

        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');
        
        $id = $data->update($this->request->getPost('id'), [
            "status" => $this->request->getPost('status'),
            "tanggal_pembayaran" => date('Y-m-d H:i:s'),
            "id_pengurus" => $this->idLogin
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

}
