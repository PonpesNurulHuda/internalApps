<?php

namespace App\Controllers;

use App\Models\Tahun_ajaranModel;
use CodeIgniter\API\ResponseTrait;

class Tahun_ajaran extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $tahun_ajaran = new Tahun_ajaranModel();
        $dtTahun_ajaran = $tahun_ajaran->findAll();
        $data['dtTahun_ajaran'] = $dtTahun_ajaran;

        //dd($tahun_ajaran->findAll());
        // kirim data ke view
        return view('tahun_ajaran', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['status' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new Tahun_ajaranModel();

            $id = $data->insert([
                "nama" => $this->request->getPost('nama'),
                "status" => $this->request->getPost('status'),
                "is_active" => $this->request->getPost('is_active'),
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data tahun_ajaran tersimpan',
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
        $validation->setRules(['status' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new Tahun_ajaranModel();

            $id = $data->update($this->request->getPost('id'), [
                "nama" => $this->request->getPost('nama'),
                "status" => $this->request->getPost('status'),
                "is_active" => $this->request->getPost('is_active')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data tahun_ajaran tersimpan',
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
