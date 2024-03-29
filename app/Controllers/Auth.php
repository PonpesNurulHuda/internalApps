<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserLoginModel;
use App\Models\SantriModel;
use CodeIgniter\API\ResponseTrait;

class Auth extends Controller
{
    use ResponseTrait;
    private $db;
    public function __construct()
    {
        $login = new UserLoginModel();
        $santri = new SantriModel();
        $this->db = [
            'login' => $login,
            'santri' => $santri
        ];
        helper(['form']);
    }

    public function index()
    {
        $userLogin = $this->db['login']->where(['nis' => '', 'password' => ''])->first();
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'https://api.ipify.org');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = curl_exec($curlSession);
        curl_close($curlSession);
        $data['ipServer'] = $jsonData;
        return view('login', $data);
    }

    public function cekIpServer()
    {
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'https://api.ipify.org');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = curl_exec($curlSession);
        curl_close($curlSession);
        return $jsonData;
    }

    public function auth()
    {
        $session = session();
        $nis = $this->request->getPost('nis');
        $password = $this->request->getPost('sandi');
        $userLogin = $this->db['login']->where(['nis' => $nis, 'password' => $password])->first();
        

        if ($userLogin) {
            $santri = $this->db['santri']->where(['id' => $userLogin['id_santri']])->first();

            $ses_data = [
                'nama' => $santri['nama'],  
                'id' => $santri['id']
            ];
            $session->set($ses_data);
            $data = [
                'status' => 1,
                'pesan' => "Assalamu'alaiakum ".$santri['nama'],
            ];
        } else {
            $data = [
                'status' => 0,
                'pesan' => 'email '.$nis.' / password tidak sesuai ',
            ];
        }
        return $this->respond($data, 200);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
