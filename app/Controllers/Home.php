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

    public function coba()
    {
        $data['title'] = 'Coba';
        return view('coba', $data);
    }

    public function coba_process()
    {
        $a = $this->request->getPost('a');
        $b = $this->request->getPost('b');
        $c = $this->request->getPost('c');
        $n = $this->request->getPost('n');

        if ($n == 1) {
            $hasil = $a;
        } else if ($n == 2) {
            $hasil = $b;
        } else if ($n == 3) {
            $hasil = $c;
        } else {
            $un_3 = $a;
            $un_2 = $b;
            $un_1 = $c;

            for ($i = 4; $i <= $n; $i++) {
                $un = ($un_1 - $un_2) + ($un_2 - $un_3);
                $un_3 = $un_2;
                $un_2 = $un_1;
                $un_1 = $un;
            }

            $hasil = $un;
        }

        session()->setFlashdata('hasil', $hasil);
        session()->setFlashdata('a', $a);
        session()->setFlashdata('b', $b);
        session()->setFlashdata('c', $c);
        session()->setFlashdata('n', $n);

        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function coba_process_2()
    {
        if ($this->request->getPost('n')) {
            session()->setFlashdata('hasil_2', $this->request->getPost('n'));
        }

        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function coba_process_3()
    {
        if ($this->request->getPost('n')) {
            session()->setFlashdata('hasil_3', $this->request->getPost('n'));
        }

        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
}
