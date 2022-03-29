<?php

namespace App\Controllers;

use App\Models\KelasModel;

class Kelas extends BaseController
{
    public function index()
    {
        $kelas = new KelasModel();
        $dtKelas = $kelas->findAll();
        $data['dtKelas'] = $dtKelas;

        //dd($kelas->findAll());
        // kirim data ke view
        return view('kelas', $data);
    }
}
