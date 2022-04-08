<?php

namespace App\Controllers;

use App\Models\Nilai_santriModel;
use CodeIgniter\API\ResponseTrait;

class Nilai_santri extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $nilai_santri = new Nilai_santriModel();
        $dtNilai_santri = $nilai_santri->findAll();
        $data['dtNilai_santri'] = $nilai_santri->DataNilai_santriDetail();
        return view('nilai_santri', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['id_siswa_kelas' => 'required']);
        $validation->setRules(['id_mapel_kelas' => 'required']);
        $validation->setRules(['nilai' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new Nilai_santriModel();

            $id = $data->insert([
                "id_siswa_kelas" => $this->request->getPost('id_siswa_kelas'),
                "id_mapel_kelas" => $this->request->getPost('id_mapel_kelas'),
                "nilai" => $this->request->getPost('nilai')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data nilai_santri tersimpan',
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

        $validation->setRules(['id_siswa_kelas' => 'required']);
        $validation->setRules(['id_mapel_kelas' => 'required']);
        $validation->setRules(['nilai' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new Nilai_santriModel();

            $id = $data->update($this->request->getPost('id'), [
                "id_siswa_kelas" => $this->request->getPost('id_siswa_kelas'),
                "id_mapel_kelas" => $this->request->getPost('id_mapel_kelas'),
                "nilai" => $this->request->getPost('nilai')
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
