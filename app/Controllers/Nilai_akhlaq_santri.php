<?php

namespace App\Controllers;

use App\Models\Nilai_akhlaq_santriModel;
use CodeIgniter\API\ResponseTrait;

class Nilai_akhlaq_santri extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $nilai_akhlaq_santri = new Nilai_akhlaq_santriModel();
        $dtNilai_akhlaq_santri = $nilai_akhlaq_santri->findAll();
        $data['dtNilai_akhlaq_santri'] = $dtNilai_akhlaq_santri;

        //dd($nilai_akhlaq_santri->findAll());
        // kirim data ke view
        return view('nilai_akhlaq_santri', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['id_santri' => 'required']);
        $validation->setRules(['id_semester' => 'required']);
        $validation->setRules(['akhlaq' => 'required']);
        $validation->setRules(['kerapihan' => 'required']);
        $validation->setRules(['kerajinan' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new Nilai_akhlaq_santriModel();

            $id = $data->insert([
                "id_santri" => $this->request->getPost('id_santri'),
                "id_semester" => $this->request->getPost('id_semester'),
                "akhlaq" => $this->request->getPost('akhlaq'),
                "kerapihan" => $this->request->getPost('kerapihan'),
                "kerajinan" => $this->request->getPost('kerajinan'),
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data nilai_akhlaq_santri tersimpan',
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

        $validation->setRules(['id_santri' => 'required']);
        $validation->setRules(['id_semester' => 'required']);
        $validation->setRules(['akhlaq' => 'required']);
        $validation->setRules(['kerapihan' => 'required']);
        $validation->setRules(['kerajinan' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new Nilai_akhlaq_santriModel();

            $id = $data->update($this->request->getPost('id'), [
                "id_santri" => $this->request->getPost('id_santri'),
                "id_semester" => $this->request->getPost('id_semester'),
                "akhlaq" => $this->request->getPost('akhlaq'),
                "kerapihan" => $this->request->getPost('kerapihan'),
                "kerajinan" => $this->request->getPost('kerajinan')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data nilai_akhlaq_santri tersimpan',
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
