<?php

namespace App\Controllers;

use App\Models\SemesterModel;

class Semester extends BaseController
{
    public function index()
    {
        $semester = new SemesterModel();
        $dtSemester = $semester->findAll();
        $data['dtSemester'] = $dtSemester;

        //dd($semester->findAll());
        // kirim data ke view
        return view('semester', $data);
    }
}
