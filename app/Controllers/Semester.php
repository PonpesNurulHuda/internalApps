<?php

namespace App\Controllers;

use App\Models\SemesterModel;
use CodeIgniter\API\ResponseTrait;

class Semester extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $semester = new SemesterModel();
        $dtSemester = $semester->findAll();
        $data['dtSemester'] = $semester->DataSemesterDetail();
        return view('semester', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['tahun_ajaran_id' => 'required']);
        $validation->setRules(['seqno' => 'required']);
        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['dimulai' => 'required']);
        $validation->setRules(['selesai' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new SemesterModel();

            $id = $data->insert([
                "tahun_ajaran_id" => $this->request->getPost('tahun_ajaran_id'),
                "seqno" => $this->request->getPost('seqno'),
                "nama" => $this->request->getPost('nama'),
                "dimulai" => $this->request->getPost('dimulai'),
                "selesai" => $this->request->getPost('selesai'),
                "is_active" => $this->request->getPost('is_active')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data semester tersimpan',
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

        $validation->setRules(['tahun_ajaran_id' => 'required']);
        $validation->setRules(['seqno' => 'required']);
        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['dimulai' => 'required']);
        $validation->setRules(['selesai' => 'required']);
        $validation->setRules(['is_active' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new SemesterModel();

            $id = $data->update($this->request->getPost('id'), [
                "tahun_ajaran_id" => $this->request->getPost('tahun_ajaran_id'),
                "seqno" => $this->request->getPost('seqno'),
                "nama" => $this->request->getPost('nama'),
                "dimulai" => $this->request->getPost('dimulai'),
                "selesai" => $this->request->getPost('selesai'),
                "is_active" => $this->request->getPost('is_active')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data semester tersimpan',
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
