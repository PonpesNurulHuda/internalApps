<?php

namespace App\Controllers;
use App\Models\SantriModel;

class Santri extends BaseController
{
    public function index()
    {
		$santri = new SantriModel();
        $dtSantri = $santri->findAll();
        $data['dtSantri'] = $dtSantri;
        
        //dd($santri->findAll());
        // kirim data ke view
        return view('santri', $data);
    }
}
