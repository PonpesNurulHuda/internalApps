<?php

namespace App\Controllers;

use App\Models\Tahun_ajaranModel;

class Thn_ajrn extends BaseController
{
    public function index()
    {
        $thn_ajrn = new Tahun_ajaranModel();
        $dtThn_ajrn = $thn_ajrn->findAll();
        $data['dtThn_ajrn'] = $dtThn_ajrn;

        //dd($thn_ajrn->findAll());
        // kirim data ke view
        return view('thn_ajrn', $data);
    }
}
