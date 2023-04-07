<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\mapel_kategoriModel;
use App\Models\Mapel_tipeModel;
use App\Models\Siswa_kelasModel;
use App\Models\Mapel_kelasModel;
use App\Models\MapelModel;
use App\Models\Nilai_akhlaq_santriModel;
use App\Models\Nilai_santriModel;
use App\Models\SantriModel;
use App\Models\Tahun_ajaranModel;
use App\Models\TingkatKelasModel;
use App\Models\SemesterModel;

use CodeIgniter\API\ResponseTrait;

class UniversalGetData extends BaseController
{
    use ResponseTrait;
    public function mapel_kategori()
    {
        $mapel_kategori = new mapel_kategoriModel();
        $dtmapel_kategori = $mapel_kategori->findAll();
        return $this->respond($dtmapel_kategori, 200);
    }

    public function mapelTipe()
    {
        $mapelTipe = new Mapel_tipeModel();
        $dtmapelTipe = $mapelTipe->findAll();
        return $this->respond($dtmapelTipe, 200);
    }

    public function kelas()
    {
        $kelas = new KelasModel();
        $dtkelas = $kelas->findAll();
        return $this->respond($dtkelas, 200);
    }

    public function siswa_kelas()
    {
        $siswa_kelas = new Siswa_kelasModel();
        $dtsiswa_kelas = $siswa_kelas->DataSiswa_kelasDetail();
        return $this->respond($dtsiswa_kelas, 200);
    }

    public function mapel_kelas()
    {
        $mapel_kelas = new Mapel_kelasModel();
        $dtmapel_kelas = $mapel_kelas->findAll();
        return $this->respond($dtmapel_kelas, 200);
    }

    public function mapel()
    {
        $mapel = new MapelModel();
        $dtmapel = $mapel->findAll();
        return $this->respond($dtmapel, 200);
    }

    public function nilai_akhlaq_santri()
    {
        $nilai_akhlaq_santri = new Nilai_akhlaq_santriModel();
        $dtnilai_akhlaq_santri = $nilai_akhlaq_santri->findAll();
        return $this->respond($dtnilai_akhlaq_santri, 200);
    }

    public function nilai_santri()
    {
        $nilai_santri = new Nilai_santriModel();
        $dtnilai_santri = $nilai_santri->findAll();
        return $this->respond($dtnilai_santri, 200);
    }

    public function santri()
    {
        $santri = new SantriModel();
        $dtsantri = $santri->findAll();
        return $this->respond($dtsantri, 200);
    }

    public function tahun_ajaran()
    {
        $tahun_ajaran = new Tahun_ajaranModel();
        $dttahun_ajaran = $tahun_ajaran->findAll();
        return $this->respond($dttahun_ajaran, 200);
    }

    public function tingkat()
    {
        $tingkat = new TingkatKelasModel();
        $dttingkat = $tingkat->findAll();
        return $this->respond($dttingkat, 200);
    }

    public function semester()
    {
        $semester = new SemesterModel();
        $dtsemester = $semester->findAll();
        return $this->respond($dtsemester, 200);
    }
}
