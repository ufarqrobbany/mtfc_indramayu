<?php

namespace App\Controllers;

use App\Models\KontakModel;
use App\Models\GaleriModel;
use App\Models\BeritaModel;
use App\Models\KomentarBeritaModel;
use App\Models\SubkomentarBeritaModel;
use App\Models\ViewBeritaModel;
use App\Models\PesanModel;

class Berita extends BaseController
{
    public function index($index)
    {
        $kontakData = new KontakModel();
        $beritaModel = new BeritaModel();
        $komentarModel = new KomentarBeritaModel();
        $viewModel = new ViewBeritaModel();
        $data['kontak'] = $kontakData->first();
        $data['berita'] = $beritaModel->getData();
        $data['komentar'] = $komentarModel->getData();
        $data['view'] = $viewModel->getData();
        $data['index'] = $index;
        $data['title'] = 'Berita';

        return view('berita', $data);
    }

    public function view_berita($slug, $index)
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        $kontakData = new KontakModel();
        $beritaModel = new BeritaModel();
        $komentarModel = new KomentarBeritaModel();
        $subKomentarModel = new SubkomentarBeritaModel();
        $viewModel = new ViewBeritaModel();
        $galeriModel = new GaleriModel();
        $data['kontak'] = $kontakData->first();
        $data['berita'] = $beritaModel->getDataBySlug($slug);
        $data['berita_lainnya'] = $beritaModel->getData();
        $data['komentar'] = $komentarModel->getData();
        $data['galeri'] = $galeriModel->getData();
        $data['view'] = $viewModel->getData();
        $data['title'] = $data['berita'][0]->judul;
        $data['index'] = $index;

        $viewModel->insert([
            'waktu' => $now,
            'id_berita' => $data['berita'][0]->id_berita
        ]);

        $id_berita = $data['berita'][0]->id_berita;

        $data['komentar_ini'] = $komentarModel->getDataID($id_berita);

        return view('berita_view', $data);
    }

    public function admin_berita($index)
    {
        $beritaModel = new BeritaModel();
        $komentarModel = new KomentarBeritaModel();
        $viewModel = new ViewBeritaModel();
        $data['berita'] = $beritaModel->getData();
        $data['komentar'] = $komentarModel->getData();
        $data['view'] = $viewModel->getData();
        $data['index'] = $index;
        $data['title'] = 'Berita';
        $pesanModel = new PesanModel();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/berita/index.php', $data);
    }

    public function tambah_berita()
    {
        $data['title'] = 'Tambah Berita';
        $pesanModel = new PesanModel();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/berita/tambah_berita.php', $data);
    }

    public function add_berita()
    {
        if (!$this->validate([
            'thumbnail' => [
                'rules' => 'uploaded[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]|max_size[thumbnail,5120]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 3 MB'
                ]

            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $berita = new BeritaModel();
        $dataFoto = $this->request->getFile('thumbnail');
        $fileName = $dataFoto->getRandomName();

        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        $judulStr = $this->request->getVar('judul');

        $slugBerita = str_replace(' ', '-', strtolower($judulStr));

        $slugCount = $berita->like('slug', $slugBerita)->findAll();

        if (count($slugCount) != 0) {
            $slugBerita = $slugBerita . "_" . strval(count($slugCount));
        }

        $berita->insert([
            'judul' => $this->request->getPost('judul'),
            'thumbnail' => $fileName,
            'isi' => $this->request->getPost('isi'),
            'tgl_dibuat' => $now,
            'tgl_diupdate' => $now,
            'slug' => $slugBerita
        ]);

        $dataFoto->move('upload/image/berita/', $fileName);
        session()->setFlashdata('success', 'Berhasil menambah data berita');
        return redirect()->to(base_url('admin/berita/1'));
    }

    public function edit_berita($id)
    {
        $beritaData = new BeritaModel();
        $data['berita'] = (object) $beritaData->where('id_berita', $id)->first();
        $data['title'] = 'Edit Berita';
        $pesanModel = new PesanModel();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/berita/edit_berita.php', $data);
    }

    public function save_berita($id)
    {
        $berita = new BeritaModel();

        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        $judulStr = $this->request->getVar('judul');

        $slugBerita = str_replace(' ', '-', strtolower($judulStr));

        $slugCount = $berita->like('slug', $slugBerita)->findAll();

        if (count($slugCount) != 0) {
            $slugBerita = $slugBerita . "_" . strval(count($slugCount));
        }

        if ($this->request->getFile('thumbnail') != '') {

            if (!$this->validate([
                'thumbnail' => [
                    'rules' => 'mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]|max_size[thumbnail,5120]',
                    'errors' => [
                        'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                        'max_size' => 'Ukuran File Maksimal 3 MB'
                    ]

                ]
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }

            $dataFoto = $this->request->getFile('thumbnail');
            $fileName = $dataFoto->getRandomName();

            $data = [
                'judul' => $this->request->getPost('judul'),
                'thumbnail' => $fileName,
                'isi' => $this->request->getPost('isi'),
                'tgl_diupdate' => $now,
                'slug' => $slugBerita
            ];

            $dataFoto->move('upload/image/berita/', $fileName);
        } else {
            $data = [
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'tgl_diupdate' => $now,
                'slug' => $slugBerita
            ];
        }

        if ($berita->update($id, $data)) {
            session()->setFlashdata('success', 'Berhasil update data berita');
            return redirect()->to(base_url('admin/berita/1'));
        }
    }

    public function hapus_berita($id)
    {
        $berita = new BeritaModel();
        $komentar = new KomentarBeritaModel();
        $subkomentar = new SubkomentarBeritaModel();
        $view = new ViewBeritaModel();

        if ($berita->find($id)) {
            $komen = $komentar->where('id_berita', $id)->first();
            if ($komen) {
                $subkomentar->where('id_komentar', $komen->id_komentar)->delete();
                $komentar->where('id_berita', $id)->delete();
            }
            $view->where('id_berita', $id)->delete();
            $berita->delete($id);
            session()->setFlashdata('success', 'Berhasil hapus data berita');
            return redirect()->to(base_url('admin/berita/1'));
        }
    }

    public function hapus_semua_berita()
    {
        $beritaData = new BeritaModel();
        $beritaData->deleteData();
        session()->setFlashdata('success', 'Berhasil hapus berita');
        return redirect()->to(base_url('admin/berita/1'));
    }
}
