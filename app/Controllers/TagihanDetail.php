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

    public function __construct()
    {
        $kelas = new KelasModel();
        $tagihanDetail = new TagihanDetailModel();
        $tagihan = new TagihanModel();
        $santri = new SantriModel();
        $this->db = [
            'kelas' => $kelas,
            'tagihanDetail' => $tagihanDetail,
            'tagihan' => $tagihan,
            'santri' => $santri,
        ]; //use the $this keyword to access class variables
    }
    public function index()
    {
        $data['dtTagihanMaster'] = $this->db['tagihan']->getWhere(['is_active' => 1])->getResultArray();
        $data['dtKelas'] = $this->db['kelas']->KelasActive();
        $data['dtSantri'] = $this->db['santri']->GetSantriKelas();
        $data['dtTagihan'] = $this->db['tagihanDetail']->GetAllTagihan();
        
        return view('tagihanDetail', $data);
    }

    public function generate()
    {
        $kelas = $this->request->getPost('kelas');
        $id_tagihan = $this->request->getPost('id_tagihan');
        $jatuh_tempo = $this->request->getPost('jatuh_tempo');

        if($kelas != 0){
            $this->generateTagihanByClass($kelas, $id_tagihan, $jatuh_tempo);
        }else{
            foreach($this->db['kelas']->KelasActive() as $a){
                $this->addTagihan($a['id'],$id_tagihan, $jatuh_tempo);
            }
        }

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

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['kode' => 'required']);
        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['tingkat_id' => 'required']);
        $validation->setRules(['tahun_ajaran_id' => 'required']);
        $validation->setRules(['walikelas' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new KelasModel();

            $id = $data->insert([
                "kode" => $this->request->getPost('kode'),
                "nama" => $this->request->getPost('nama'),
                "tingkat_id" => $this->request->getPost('tingkat_id'),
                "tahun_ajaran_id" => $this->request->getPost('tahun_ajaran_id'),
                "walikelas" => $this->request->getPost('walikelas'),
                "is_active" => $this->request->getPost('is_active'),
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data kelas tersimpan',
                ];
                return $this->respond($data, 200);
            }
        } else {

            $data = [
                'id' => 0,
                'pesan' => 'data gagal tersimpan',
            ];
            return $this->respond($data, 200);
        }
    }

    public function update()
    {
        $data = new TagihanDetailModel();

        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');
        
        $id = $data->update($this->request->getPost('id'), [
            "status" => $this->request->getPost('status')
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
