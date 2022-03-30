<?php

namespace App\Controllers;

use App\Models\Mapel_kategoriModel;

class Mapel_kategori extends BaseController
{
    public function index()
    {
        $mapel_kategori = new Mapel_kategoriModel();
        $dtMapel_kategori = $mapel_kategori->findAll();
        $data['dtMapel_kategori'] = $dtMapel_kategori;

        //dd($mapel_kategori->findAll());
        // kirim data ke view
        return view('mapel_kategori', $data);
    }
}
