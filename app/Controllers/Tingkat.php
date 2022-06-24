<?php

namespace App\Controllers;

use App\Models\TingkatModel;
use CodeIgniter\API\ResponseTrait;

class Tingkat extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $tingkat = new TingkatModel();
        $dtTingkat = $tingkat->findAll();
        $data['dtTingkat'] = $dtTingkat;

        //dd($tbl01->findAll());
        // kirim data ke view
        return view('tingkat', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['seqno' => 'required']);
        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new TingkatModel();

            $id = $data->insert([
                "seqno" => $this->request->getPost('seqno'),
                "nama" => $this->request->getPost('nama'),
                "is_active" => $this->request->getPost('is_active'),
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data tbl01 tersimpan',
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
        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['seqno' => 'required']);
        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new TingkatModel();

            $id = $data->update($this->request->getPost('id'), [
                "seqno" => $this->request->getPost('seqno'),
                "nama" => $this->request->getPost('nama'),
                "is_active" => $this->request->getPost('is_active')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data tbl01 tersimpan',
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
}
