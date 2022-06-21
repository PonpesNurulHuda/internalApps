<?php

namespace App\Controllers;
use App\Models\TagihanModel;

class Home extends BaseController
{
    private $db;
    private $idLogin;
    private $nameUser;
    
    public function __construct()
    {
        $session = session();
        $this->idLogin = $session->get('id');
        $this->nameUser = $session->get('nama');
        $this->db = [
            'tagihan' => new TagihanModel()
        ];
    }

    public function index()
    {
        $data['data'] = $this->db['tagihan']->rekap();
        return view('home', $data);
    }
}
