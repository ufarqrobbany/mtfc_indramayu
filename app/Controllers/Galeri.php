<?php

namespace App\Controllers;

use App\Models\KontakModel;
use App\Models\GaleriModel;
use App\Models\PesanModel;

class Galeri extends BaseController
{
    public function index($index)
    {
        $kontakData = new KontakModel();
        $galeriData = new GaleriModel();
        $data['kontak'] = $kontakData->first();
        $data['galeri'] = $galeriData->getData();
        $data['index'] = $index;
        $data['title'] = 'Galeri';

        return view('galeri', $data);
    }

    public function admin_galeri($index)
    {
        $galeriData = new GaleriModel();
        $data['galeri'] = $galeriData->getData();
        $data['title'] = 'Galeri';
        $data['index'] = $index;
        $pesanModel = new PesanModel();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/galeri/index.php', $data);
    }

    public function tambah_galeri()
    {
        $data['title'] = 'Tambah Galeri';
        $pesanModel = new PesanModel();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/galeri/tambah_galeri.php', $data);
    }

    public function edit_galeri($id)
    {
        $galeriData = new GaleriModel();
        $data['galeri'] = (object) $galeriData->where('id_galeri', $id)->first();
        $data['title'] = 'Edit Galeri';
        $pesanModel = new PesanModel();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/galeri/edit_galeri.php', $data);
    }

    public function add_galeri()
    {
        if (!$this->validate([
            'foto' => [
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,3072]',
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

        $galeri = new GaleriModel();
        $dataFoto = $this->request->getFile('foto');
        $fileName = $dataFoto->getRandomName();

        $galeri->insert([
            'foto' => $fileName,
            'keterangan' => $this->request->getPost('keterangan'),
            'tgl_upload' => date("Y-m-d")
        ]);

        $dataFoto->move('upload/image/galeri/', $fileName);
        session()->setFlashdata('success', 'Berhasil menambah data galeri');
        return redirect()->to(base_url('admin/galeri/1'));
    }

    public function save_galeri($id)
    {
        $galeri = new GaleriModel();

        if ($this->request->getFile('foto') != '') {

            if (!$this->validate([
                'foto' => [
                    'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,3072]',
                    'errors' => [
                        'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                        'max_size' => 'Ukuran File Maksimal 3 MB'
                    ]

                ]
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }

            $dataFoto = $this->request->getFile('foto');
            $fileName = $dataFoto->getRandomName();

            $data = [
                'foto' => $fileName,
                'keterangan' => $this->request->getPost('keterangan'),
            ];

            $dataFoto->move('upload/image/galeri/', $fileName);
        } else {
            $data = [
                'keterangan' => $this->request->getPost('keterangan'),
            ];
        }

        if ($galeri->update($id, $data)) {
            session()->setFlashdata('success', 'Berhasil update data galeri');
            return redirect()->to(base_url('admin/galeri/1'));
        }
    }

    public function hapus_galeri($id)
    {
        $galeri = new GaleriModel();

        if ($galeri->find($id)) {
            $galeri->delete($id);
            session()->setFlashdata('success', 'Berhasil hapus data galeri');
            return redirect()->to(base_url('admin/galeri/1'));
        }
    }

    public function hapus_semua_galeri()
    {
        $galeriData = new GaleriModel();
        $galeriData->deleteData();
        session()->setFlashdata('success', 'Berhasil hapus galeri');
        return redirect()->to(base_url('admin/galeri/1'));
    }
}
