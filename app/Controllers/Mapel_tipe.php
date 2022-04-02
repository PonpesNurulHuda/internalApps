<?php

namespace App\Controllers;

use App\Models\Mapel_tipeModel;
use CodeIgniter\API\ResponseTrait;

class Mapel_tipe extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $mapel_tipe = new Mapel_tipeModel();
        $dtMapel_tipe = $mapel_tipe->findAll();
        $data['dtMapel_tipe'] = $dtMapel_tipe;

        //dd($mapel_tipe->findAll());
        // kirim data ke view
        return view('mapel_tipe', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['deskripsi' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new Mapel_tipeModel();

            $id = $data->insert([
                "nama" => $this->request->getPost('nama'),
                "deskripsi" => $this->request->getPost('deskripsi'),
                "is_active" => $this->request->getPost('is_active'),
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data mapel_tipe tersimpan',
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

        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['deskripsi' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new Mapel_tipeModel();

            $id = $data->update($this->request->getPost('id'), [
                "nama" => $this->request->getPost('nama'),
                "deskripis" => $this->request->getPost('deskripsi'),
                "is_active" => $this->request->getPost('is_active')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data mapel_tipe tersimpan',
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
