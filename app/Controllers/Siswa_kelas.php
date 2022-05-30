<?php

namespace App\Controllers;

use App\Models\Siswa_kelasModel;
use CodeIgniter\API\ResponseTrait;

class Siswa_kelas extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $siswa_kelas = new Siswa_kelasModel();
        $Siswa_kelas = $siswa_kelas->findAll();
        $data['dtSiswa_kelas'] = $siswa_kelas->DataSiswa_kelasDetail();
        return view('siswa_kelas', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['id_siswa' => 'required']);
        $validation->setRules(['id_kelas' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new Siswa_kelasModel();

            $id = $data->insert([
                "id_siswa" => $this->request->getPost('id_siswa'),
                "id_kelas" => $this->request->getPost('id_kelas'),
                "is_active" => $this->request->getPost('is_active'),
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data siswa_kelas tersimpan',
                ];
            }else{
                $data = [
                    'id' => 0,
                    'pesan' => 'terjadi kesalahan'
                ];
            }
        } else {

            $data = [
                'id' => 0,
                'pesan' => 'data gagal tersimpan',
            ];
            return $this->respond($data, 200);
        }
        
        return $this->respond($data, 200);
    }
    public function update()
    {
        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['id_siswa' => 'required']);
        $validation->setRules(['id_kelas' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new Siswa_kelasModel();

            $id = $data->update($this->request->getPost('id'), [
                "id_siswa" => $this->request->getPost('id_siswa'),
                "id_kelas" => $this->request->getPost('id_kelas'),
                "is_active" => $this->request->getPost('is_active'),
                "updated_at" => date('Y-m-d H:i:s')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data mapel_kategori tersimpan',
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
