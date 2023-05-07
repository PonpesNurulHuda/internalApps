<?php

namespace App\Controllers;

use App\Models\PresentModel;
use App\Models\SantriModel;
use CodeIgniter\API\ResponseTrait;

class Present extends BaseController
{
    use ResponseTrait;
    private $db;
    public function __construct()
    {
        $santriModel = new SantriModel();
        $presentModel = new PresentModel();
        $this->db = [
            'santriModel' => $santriModel,
            'presentModel' => $presentModel
        ];
        helper(['form']);
    }
    public function index()
    {
        $card = $_GET['card'];
        $ruang = '';
        $ruang = $_GET['ruang'];

        $santriPresent = $this->db['santriModel']->where(['card_id' => $card])->first();
        if ($santriPresent) {
            $data = new PresentModel();
            $id = $data->insert([
                "id_santri" => $santriPresent['id'],
                "ruang" => $ruang,
                "present_at" => $milliseconds = floor(microtime(true) * 1000)
            ]);
        if ($id > 0) {
            echo $santriPresent['nama'];
            echo " - Sukses";
        }else{
            echo $santriPresent['nama'];
            echo " - Gagal, hubungi pengurus";
        }
                        
        } else {
           echo $card;
           echo ' - Kartu tidak ditemukan';
        }


        // $kelas = new PresentModel();
        // $dtKelas = $kelas->findAll();
        // $data['dtKelas'] = $kelas->DataKelasDetail();
        // return view('kelas', $data);
    }

    // public function add()
    // {

    //     $validation =  \Config\Services::validation();
    //     // setiap kolom kasih validasi is required
    //     // kecuali created_at, updated_at dan id 

    //     $validation->setRules(['kode' => 'required']);
    //     $validation->setRules(['nama' => 'required']);
    //     $validation->setRules(['tingkat_id' => 'required']);
    //     $validation->setRules(['tahun_ajaran_id' => 'required']);
    //     $validation->setRules(['walikelas' => 'required']);
    //     $validation->setRules(['is_active' => 'required']);

    //     $isDataValid = $validation->withRequest($this->request)->run();

    //     // jika data valid, simpan ke database
    //     if ($isDataValid) {
    //         $data = new KelasModel();

    //         $id = $data->insert([
    //             "kode" => $this->request->getPost('kode'),
    //             "nama" => $this->request->getPost('nama'),
    //             "tingkat_id" => $this->request->getPost('tingkat_id'),
    //             "tahun_ajaran_id" => $this->request->getPost('tahun_ajaran_id'),
    //             "walikelas" => $this->request->getPost('walikelas'),
    //             "is_active" => $this->request->getPost('is_active'),
    //             "created_at" => date('Y-m-d H:i:s'),
    //             "updated_at" => date('Y-m-d H:i:s')
    //         ]);

    //         if ($id > 0) {
    //             $data = [
    //                 'id' => $id,
    //                 'pesan' => 'data kelas tersimpan',
    //             ];
    //             return $this->respond($data, 200);
    //         }
    //     } else {

    //         $data = [
    //             'id' => 0,
    //             'pesan' => 'data gagal tersimpan',
    //         ];
    //         return $this->respond($data, 200);
    //     }
    // }
}
