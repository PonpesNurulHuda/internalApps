<?php

namespace App\Controllers;

use App\Models\TagihanModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\TagihanDetailModel;

class TagihanPeriode extends BaseController
{
    use ResponseTrait;
    private $db;
    public function __construct()
    {
        $session = session();
        $idLogin = $session->get('id');

        $this->db = [
            'tagihanDetail' => new TagihanDetailModel(),
            'tagihan' => new TagihanModel()
        ];
    }

    public function index()
    {
        $semester = new TagihanModel();
        $data = $semester->findAll();
        $data['data'] = $data;
        return view('tagihan/index', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['description' => 'required']);
        $validation->setRules(['jumlah' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new TagihanModel();

            $id = $data->insert([
                "nama" => $this->request->getPost('nama'),
                "description" => $this->request->getPost('description'),
                "jumlah" => $this->request->getPost('jumlah'),
                "is_active" => $this->request->getPost('is_active')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data semester tersimpan',
                ];
                return $this->respond($data, 200);
            }
        } else {

            $data = [
                'id' => 0,
                'pesan' => 'validasi data gagal tersimpan',
            ];
            return $this->respond($data, 200);
        }
    }

    public function update()
    {
        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['description' => 'required']);
        $validation->setRules(['jumlah' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new TagihanModel();

            $id = $data->update($this->request->getPost('id'), [
                "nama" => $this->request->getPost('nama'),
                "description" => $this->request->getPost('description'),
                "jumlah" => $this->request->getPost('jumlah'),
                "is_active" => $this->request->getPost('is_active')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data semester tersimpan',
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

    public function rekap(){
        $semester = new TagihanModel();
        $data = $semester->findAll();
        $data['data'] = $data;
        return view('tagihan/rekap', $data);
    }

    public function rekapTagihan($idTagihanMaster = 0, $statusPembayaran = "0"){
        
        $data = $this->db['tagihanDetail']->rekapPerTagihan($idTagihanMaster,$statusPembayaran);
        $output = [
            'status' => 1,
            'data' => $data,
        ];
        return $this->respond($output, 200);
    }

    public function rekapTagihanCustom($idKelas, $idTagihan, $statusPenerimaaan, $idSantri){
        

        $data = $this->db['tagihanDetail']->rekapPerTagihanCustom($idKelas, $idTagihan, $statusPenerimaaan, $idSantri);
        $output = [
            'status' => 1,
            'data' => $data,
        ];
        return $this->respond($output, 200);
    }
}