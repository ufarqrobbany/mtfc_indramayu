<?php

namespace App\Controllers;

use App\Models\KontakModel;
use App\Models\TimModel;
use App\Models\SematTimModel;
use App\Models\GaleriModel;
use App\Models\BeritaModel;
use App\Models\KomentarBeritaModel;
use App\Models\SubkomentarBeritaModel;
use App\Models\ViewBeritaModel;

class Home extends BaseController
{
    public function index()
    {
        $kontakData = new KontakModel();
        $data['kontak'] = $kontakData->first();
        $timData = new TimModel();
        $sematTimData = new SematTimModel();
        $data['tim'] = $timData->getNoSematData();
        $data['tim_semat'] = $sematTimData->getData();
        $galeriData = new GaleriModel();
        $data['galeri'] = $galeriData->getData();
        $beritaModel = new BeritaModel();
        $komentarModel = new KomentarBeritaModel();
        $viewModel = new ViewBeritaModel();
        $data['berita'] = $beritaModel->getData();
        $data['komentar'] = $komentarModel->getData();
        $data['view'] = $viewModel->getData();
        $data['title'] = 'Beranda';
        return view('home', $data);
    }
}
