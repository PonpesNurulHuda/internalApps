<?php

namespace App\Controllers;

use App\Models\MapelModel;

class Mapel extends BaseController
{
    public function index()
    {
        $mapel = new MapelModel();
        $dtMapel = $mapel->findAll();
        $data['dtMapel'] = $dtMapel;

        //dd($mapel->findAll());
        // kirim data ke view
        return view('mapel', $data);
    }
}
