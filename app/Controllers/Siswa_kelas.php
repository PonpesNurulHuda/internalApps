<?php

namespace App\Controllers;

use App\Models\Siswa_kelasModel;

class Siswa_kls extends BaseController
{
    public function index()
    {
        $siswa_kls = new Siswa_kelasModel();
        $dtSiswa_kls = $siswa_kls->findAll();
        $data['dtSiswa_kls'] = $dtSiswa_kls;

        //dd($siswa_kls->findAll());
        // kirim data ke view
        return view('siswa_kls', $data);
    }
}
