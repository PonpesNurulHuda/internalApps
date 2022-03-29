<?php

namespace App\Controllers;

use App\Models\Mapel_tipeModel;

class Mpl_tipe extends BaseController
{
    public function index()
    {
        $mpl_tipe = new Mapel_tipeModel();
        $dtMpl_tipe = $mpl_tipe->findAll();
        $data['dtMpl_tipe'] = $dtMpl_tipe;

        //dd($mpl_tipe->findAll());
        // kirim data ke view
        return view('mpl_tipe', $data);
    }
}
