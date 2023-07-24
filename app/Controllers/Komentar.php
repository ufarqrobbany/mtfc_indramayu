<?php

namespace App\Controllers;

use App\Models\PesanModel;
use App\Models\BeritaModel;
use App\Models\KomentarBeritaModel;
use App\Models\SubkomentarBeritaModel;

class Komentar extends BaseController
{
    public function index($index)
    {
        $pesanModel = new PesanModel();
        $beritaModel = new BeritaModel();
        $komentarModel = new KomentarBeritaModel();
        $subKomentarModel = new SubkomentarBeritaModel();

        $data['index'] = $index;
        $data['title'] = 'Komentar';
        $data['berita'] = $beritaModel->getData();
        $data['komentar'] = $komentarModel->getData()->get()->getResult();
        $data['subkomentar'] = $subKomentarModel->getData();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/komentar/index.php', $data);
    }

    public function add_komentar()
    {
        $komentarModel = new KomentarBeritaModel();

        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        if ($this->request->getPost('foto') != NULL) {
            $komentarModel->insert([
                'nama' => $this->request->getPost('nama'),
                'foto' => $this->request->getPost('foto'),
                'komentar' => $this->request->getPost('komentar'),
                'waktu' => $now,
                'id_berita' => $this->request->getPost('id_berita'),
            ]);
        } else {
            $komentarModel->insert([
                'nama' => $this->request->getPost('nama'),
                'komentar' => $this->request->getPost('komentar'),
                'waktu' => $now,
                'id_berita' => $this->request->getPost('id_berita'),
            ]);
        }

        session()->setFlashdata('success', 'Berhasil menambahkan komentar');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function add_subkomentar()
    {
        $subKomentarModel = new SubkomentarBeritaModel();

        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        if ($this->request->getPost('foto') != NULL) {
            $subKomentarModel->insert([
                'nama' => $this->request->getPost('nama'),
                'foto' => $this->request->getPost('foto'),
                'komentar' => $this->request->getPost('komentar'),
                'waktu' => $now,
                'id_komentar' => $this->request->getPost('id_komentar'),
                'id_berita' => $this->request->getPost('id_berita'),
            ]);
        } else {
            $subKomentarModel->insert([
                'nama' => $this->request->getPost('nama'),
                'komentar' => $this->request->getPost('komentar'),
                'waktu' => $now,
                'id_komentar' => $this->request->getPost('id_komentar'),
                'id_berita' => $this->request->getPost('id_berita'),
            ]);
        }

        session()->setFlashdata('success', 'Berhasil menambahkan komentar');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function hapus_komentar($id)
    {
        $komentarModel = new KomentarBeritaModel();
        $komentarModel->deleteDataByKomen($id);
        session()->setFlashdata('success', 'Berhasil hapus komentar');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function hapus_komentar_ini($id_komen)
    {
        $komentarModel = new KomentarBeritaModel();
        $subKomentarModel = new SubkomentarBeritaModel();

        $subKomentarModel->where('id_komentar', $id_komen)->delete();
        $komentarModel->where('id_komentar', $id_komen)->delete();
        session()->setFlashdata('success', 'Berhasil hapus komentar');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function hapus_subkomentar_ini($id_subkomen)
    {
        $subKomentarModel = new SubkomentarBeritaModel();

        $subKomentarModel->where('id_subkomentar', $id_subkomen)->delete();
        session()->setFlashdata('success', 'Berhasil hapus komentar');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function lihat($id, $index)
    {
        $data['index'] = $index;
        $data['title'] = 'Lihat Komentar';

        $pesanModel = new PesanModel();
        $beritaModel = new BeritaModel();
        $komentarModel = new KomentarBeritaModel();
        $subKomentarModel = new SubkomentarBeritaModel();

        $data['berita'] = $beritaModel->getDataByID($id);
        $data['komentar'] = $komentarModel->getDataID($id);
        $data['subkomentar'] = $subKomentarModel->getDataBerita($id);
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/komentar/lihat.php', $data);
    }

    public function lihat_balasan($id)
    {
        $data['title'] = 'Lihat Balasan Komentar';

        $pesanModel = new PesanModel();
        $beritaModel = new BeritaModel();
        $komentarModel = new KomentarBeritaModel();
        $subKomentarModel = new SubkomentarBeritaModel();

        $data['komentar'] = $komentarModel->getDataIDKomen($id);
        $data['subkomentar'] = $subKomentarModel->getDataKomen($id);
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        $data['berita'] = $beritaModel->getDataByID($data['komentar'][0]->id_berita);

        return view('admin/komentar/lihat_balasan.php', $data);
    }
}
