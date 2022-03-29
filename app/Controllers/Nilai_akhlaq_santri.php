<?php

namespace App\Controllers;

use App\Models\Nilai_akhlaq_santriModel;

class Nilai_akhsan extends BaseController
{
    public function index()
    {
        $nilai_akhsan = new Nilai_akhlaq_santriModel();
        $dtNilai_akhsan = $nilai_akhsan->findAll();
        $data['dtNilai_akhsan'] = $dtNilai_akhsan;

        //dd($nilai_akhsan->findAll());
        // kirim data ke view
        return view('nilai_akhsan', $data);
    }
}
