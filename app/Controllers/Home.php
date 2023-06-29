<?php

namespace App\Controllers;

use App\Models\KontakModel;

class Home extends BaseController
{
    public function index()
    {
        $kontakData = new KontakModel();
        $data['kontak'] = $kontakData->first();

        $data['title'] = 'Beranda';
        return view('home', $data);
    }
}
