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

        $validation->setRules(['nik' => 'required']);
        $validation->setRules(['kk' => 'required']);
        $validation->setRules(['nis' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new SantriModel();

            $id = $data->insert([
                "nik" => $this->request->getPost('nik'),
                "kk" => $this->request->getPost('kk'),
                "nama" => $this->request->getPost('nama'),
                "nis" => $this->request->getPost('nis'),
                "tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                "jenis_kelamin" => $this->request->getPost('jenis_kelamin')
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
