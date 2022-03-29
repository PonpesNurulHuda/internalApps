<?php

namespace App\Controllers;

use App\Models\Mapel_kategoriModel;

class Mpl_ktgri extends BaseController
{
    public function index()
    {
        $mpl_ktgri = new Mapel_kategoriModel();
        $dtMpl_ktgri = $mpl_ktgri->findAll();
        $data['dtMpl_ktgri'] = $dtMpl_ktgri;

        //dd($mpl_ktgri->findAll());
        // kirim data ke view
        return view('mpl_ktgri', $data);
    }
}
