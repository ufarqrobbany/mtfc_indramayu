<?php

namespace App\Controllers;

use App\Models\KomentarBeritaModel;
use App\Models\SubkomentarBeritaModel;

class Komentar extends BaseController
{
    public function index($index)
    {
        $komentarModel = new KomentarBeritaModel();
        $data['komentar'] = $komentarModel->getData();
        $data['index'] = $index;
        $data['title'] = 'Pesan';
        $data['pesan_notif'] = $komentarModel->getDataBelumDilihat();

        return view('admin/pesan/index.php', $data);
    }

    public function add_komentar()
    {
        $komentarModel = new KomentarBeritaModel();

        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        $komentarModel->insert([
            'nama' => $this->request->getPost('nama'),
            'komentar' => $this->request->getPost('komentar'),
            'waktu' => $now,
            'id_berita' => $this->request->getPost('id_berita'),
        ]);

        session()->setFlashdata('success', 'Berhasil menambahkan komentar');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function add_subkomentar()
    {
        $subKomentarModel = new SubkomentarBeritaModel();

        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        $subKomentarModel->insert([
            'nama' => $this->request->getPost('nama'),
            'komentar' => $this->request->getPost('komentar'),
            'waktu' => $now,
            'id_komentar' => $this->request->getPost('id_komentar'),
            'id_berita' => $this->request->getPost('id_berita'),
        ]);

        session()->setFlashdata('success', 'Berhasil menambahkan komentar');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
}
