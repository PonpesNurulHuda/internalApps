<?php

namespace App\Controllers;

use App\Models\Mapel_tipeModel;

class Mapel_tipe extends BaseController
{
    public function index()
    {
        $mapel_tipe = new Mapel_tipeModel();
        $dtMapel_tipe = $mapel_tipe->findAll();
        $data['dtMapel_tipe'] = $dtMapel_tipe;

        //dd($mapel_tipe->findAll());
        // kirim data ke view
        return view('mapel_tipe', $data);
    }
}
