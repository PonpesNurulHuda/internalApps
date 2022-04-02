<?php

namespace App\Controllers;

use App\Models\MapelModel;
use CodeIgniter\API\ResponseTrait;

class Mapel extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $mapel = new MapelModel();
        $dtMapel = $mapel->findAll();
        $data['dtMapel'] = $dtMapel;

        //dd($mapel->findAll());
        // kirim data ke view
        return view('mapel', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['deskripsi' => 'required']);
        $validation->setRules(['mapel_kategori_id' => 'required']);
        $validation->setRules(['mapel_type' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new MapelModel();

            $id = $data->insert([
                "nama" => $this->request->getPost('nama'),
                "deskripsi" => $this->request->getPost('deskripsi'),
                "mapel_kategori_id" => $this->request->getPost('mapel_kategori_id'),
                "mapel_type" => $this->request->getPost('mapel_type'),
                "is_active" => $this->request->getPost('is_active')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data mapel tersimpan',
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
        $validation->setRules(['mapel_kategori_id' => 'required']);
        $validation->setRules(['mapel_type' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new MapelModel();

            $id = $data->update($this->request->getPost('id'), [
                "nama" => $this->request->getPost('nama'),
                "deskripsi" => $this->request->getPost('deskripsi'),
                "mapel_kategori_id" => $this->request->getPost('mapel_kategori_id'),
                "mapel_type" => $this->request->getPost('mapel_type'),
                "is_active" => $this->request->getPost('is_active')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data mapel tersimpan',
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
