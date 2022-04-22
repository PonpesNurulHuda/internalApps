<?php

namespace App\Controllers;

use App\Models\MenuModel;
use CodeIgniter\API\ResponseTrait;

class Menu extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $menu = new MenuModel();
        $dtMenu = $menu->findAll();
        $data['dtMenu'] = $dtMenu;

        //dd($menu->findAll());
        // kirim data ke view
        return view('menu', $data);
    }

    public function add()
    {

        $validation =  \Config\Services::validation();
        // setiap kolom kasih validasi is required
        // kecuali created_at, updated_at dan id 

        $validation->setRules(['nama' => 'required']);
        $validation->setRules(['icon' => 'required']);
        $validation->setRules(['app_controller' => 'required']);
        $validation->setRules(['app_funciton' => 'required']);
        $validation->setRules(['is_have_child' => 'required']);
        $validation->setRules(['related_id' => 'required']);
        $validation->setRules(['is_active' => 'required']);
        $validation->setRules(['seqno' => 'required']);
        $validation->setRules(['menu_kategori' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new MenuModel();

            $id = $data->insert([
                "nama" => $this->request->getPost('nama'),
                "icon" => $this->request->getPost('icon'),
                "app_controller" => $this->request->getPost('app_controller'),
                "app_funciton" => $this->request->getPost('app_funciton'),
                "is_have_child" => $this->request->getPost('is_have_child'),
                "related_id" => $this->request->getPost('related_id'),
                "is_active" => $this->request->getPost('is_active'),
                "seqno" => $this->request->getPost('seqno'),
                "menu_kategori" => $this->request->getPost('menu_kategori')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data menu tersimpan',
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
        $validation->setRules(['icon' => 'required']);
        $validation->setRules(['app_controller' => 'required']);
        $validation->setRules(['app_funciton' => 'required']);
        $validation->setRules(['is_have_child' => 'required']);
        $validation->setRules(['related_id' => 'required']);
        $validation->setRules(['is_active' => 'required']);
        $validation->setRules(['seqno' => 'required']);
        $validation->setRules(['menu_kategori' => 'required']);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if ($isDataValid) {
            $data = new MenuModel();

            $id = $data->update($this->request->getPost('id'), [
                "nama" => $this->request->getPost('nama'),
                "icon" => $this->request->getPost('icon'),
                "app_controller" => $this->request->getPost('app_controller'),
                "app_funciton" => $this->request->getPost('app_funciton'),
                "is_have_child" => $this->request->getPost('is_have_child'),
                "related_id" => $this->request->getPost('related_id'),
                "is_active" => $this->request->getPost('is_active'),
                "seqno" => $this->request->getPost('seqno'),
                "menu_kategori" => $this->request->getPost('menu_kategori')
            ]);

            if ($id > 0) {
                $data = [
                    'id' => $id,
                    'pesan' => 'data menu tersimpan',
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
