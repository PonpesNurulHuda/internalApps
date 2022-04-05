<?php

namespace App\Controllers;

use App\Models\Tbl01Model;
use CodeIgniter\API\ResponseTrait;

class Tbl01 extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $tbl01 = new Tbl01Model();
        $dtTbl01 = $tbl01->findAll();
        $data['dtTbl01'] = $dtTbl01;

        //dd($tbl01->findAll());
        // kirim data ke view
        return view('tbl01', $data);
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
            $data = new Tbl01Model();

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
            $data = new Tbl01Model();

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
