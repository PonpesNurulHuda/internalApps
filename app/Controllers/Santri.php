<?php

namespace App\Controllers;

use App\Models\SantriModel;
use CodeIgniter\API\ResponseTrait;

class Santri extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $santri = new SantriModel();
        $dtSantri = $santri->findAll();
        $data['dtSantri'] = $dtSantri;

        //dd($santri->findAll());
        // kirim data ke view
        return view('santri', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['kk' => 'required']);
        $validation->setRules(['nik' => 'required']);
        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['nis' => 'required']);
        $validation->setRules(['tanggal_lahir' => 'required']);
        $validation->setRules(['gender' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new SantriModel();

            $id = $data->insert([
                "kk" => $this->request->getPost('nik'),
                "nik" => $this->request->getPost('kk'),
                "nis" => $this->request->getPost('nis'),
                "nama" => $this->request->getPost('nama'),
                "tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                "gender" => $this->request->getPost('gender')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data santri tersimpan',
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

        $validation->setRules(['kk' => 'required']);
        $validation->setRules(['nik' => 'required']);
        $validation->setRules(['nis' => 'required']);
        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['tanggal_lahir' => 'required']);
        $validation->setRules(['gender' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new SantriModel();

            $id = $data->update($this->request->getPost('id'), [
                "kk" => $this->request->getPost('kk'),
                "nik" => $this->request->getPost('nik'),
                "nis" => $this->request->getPost('nis'),
                "nama" => $this->request->getPost('nama'),
                "tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                "gender" => $this->request->getPost('gender')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data santri tersimpan',
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
