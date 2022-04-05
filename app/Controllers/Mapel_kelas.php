<?php

namespace App\Controllers;

use App\Models\Mapel_kelasModel;
use CodeIgniter\API\ResponseTrait;

class Mapel_kelas extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $mapel_kelas = new Mapel_kelasModel();
        $dtMapel_kelas = $mapel_kelas->findAll();
        $data['dtMapel_kelas'] = $dtMapel_kelas;

        //dd($mapel_kelas->findAll());
        // kirim data ke view
        return view('mapel_kelas', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['kelas_id' => 'required']);
        $validation->setRules(['semester_id' => 'required']);
        $validation->setRules(['mapel_id' => 'required']);
        $validation->setRules(['mustahiq' => 'required']);
        $validation->setRules(['keterangan' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new Mapel_kelasModel();

            $id = $data->insert([
                "nama" => $this->request->getPost('nama'),
                "kelas_id" => $this->request->getPost('kelas_id'),
                "semester_id" => $this->request->getPost('semester_id'),
                "mapel_id" => $this->request->getPost('mapel_id'),
                "mustahiq" => $this->request->getPost('mustahiq'),
                "keterangan" => $this->request->getPost('keterangan')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data mapel_kelas tersimpan',
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
        $validation->setRules(['kelas_id' => 'required']);
        $validation->setRules(['semester_id' => 'required']);
        $validation->setRules(['mapel_id' => 'required']);
        $validation->setRules(['mustahiq' => 'required']);
        $validation->setRules(['keterangan' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new Mapel_kelasModel();

            $id = $data->update($this->request->getPost('id'), [
                "nama" => $this->request->getPost('nama'),
                "kelas_id" => $this->request->getPost('kelas_id'),
                "semester_id" => $this->request->getPost('semester_id'),
                "mapel_id" => $this->request->getPost('mapel_id'),
                "mustahiq" => $this->request->getPost('mustahiq'),
                "keterangan" => $this->request->getPost('keterangan')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data mapel_kelas tersimpan',
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
