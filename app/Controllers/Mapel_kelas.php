<?php

namespace App\Controllers;

use App\Models\Mapel_kelasModel;

class Mapel_kelas extends BaseController
{
    public function index()
    {
        $mapel_kelas = new Mapel_kelasModel();
        $dtMapel_kelas = $mapel_kelas->findAll();
        $data['dtMapel_kelas'] = $dtMapel_kelas;

        //dd($mapel_kelas->findAll());
        // kirim data ke view
        return view('mapel_kelas', $data);
    }
}
