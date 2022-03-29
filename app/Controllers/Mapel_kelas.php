<?php

namespace App\Controllers;

use App\Models\Mapel_kelasModel;

class Mapel_kls extends BaseController
{
    public function index()
    {
        $mapel_kls = new Mapel_kelasModel();
        $dtMapel_kls = $mapel_kls->findAll();
        $data['dtMapel_kls'] = $dtMapel_kls;

        //dd($mapel_kls->findAll());
        // kirim data ke view
        return view('mapel_kls', $data);
    }
}
