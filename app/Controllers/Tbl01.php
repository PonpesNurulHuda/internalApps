<?php

namespace App\Controllers;

use App\Models\Tbl01Model;

class Tbl01 extends BaseController
{
    public function index()
    {
        $tbl01 = new Tbl01Model();
        $dtTbl01 = $tbl01->findAll();
        $data['dtTbl01'] = $dtTbl01;

        //dd($tbl01->findAll());
        // kirim data ke view
        return view('tbl01', $data);
    }
}
