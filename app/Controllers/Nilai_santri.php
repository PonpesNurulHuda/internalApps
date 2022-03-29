<?php

namespace App\Controllers;

use App\Models\Nilai_santriModel;

class Nisan extends BaseController
{
    public function index()
    {
        $nisan = new Nilai_santriModel();
        $dtNisan = $nisan->findAll();
        $data['dtNisan'] = $dtNisan;

        //dd($nisan->findAll());
        // kirim data ke view
        return view('nisan', $data);
    }
}
