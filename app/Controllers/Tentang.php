<?php

namespace App\Controllers;

use App\Models\KontakModel;
use App\Models\TimModel;
use App\Models\SematTimModel;

class Tentang extends BaseController
{
    public function index()
    {
        $kontakData = new KontakModel();
        $timData = new TimModel();
        $sematTimData = new SematTimModel();
        $data['kontak'] = $kontakData->first();
        $data['tim'] = $timData->getNoSematData();
        $data['tim_semat'] = $sematTimData->getData();
        $data['title'] = 'Tentang';

        return view('tentang', $data);
    }
}
