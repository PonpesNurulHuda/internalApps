<?php

namespace App\Controllers;

use App\Models\KelasModel;
use CodeIgniter\API\ResponseTrait;

class Kelas extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $kelas = new KelasModel();
        $dtKelas = $kelas->findAll();
        $data['dtKelas'] = $dtKelas;

        //dd($kelas->findAll());
        // kirim data ke view
        return view('kelas', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['kode' => 'required']);
        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['tingkat_id' => 'required']);
        $validation->setRules(['tahun_ajaran' => 'required']);
        $validation->setRules(['walikelas' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new KelasModel();

            $id = $data->insert([
                "kode" => $this->request->getPost('kode'),
                "nama" => $this->request->getPost('nama'),
                "tingkat_id" => $this->request->getPost('tingkat_id'),
                "tahun_ajaran" => $this->request->getPost('tahun_ajaran'),
                "walikelas" => $this->request->getPost('walikelas'),
                "is_active" => $this->request->getPost('is_active'),
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data kelas tersimpan',
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
