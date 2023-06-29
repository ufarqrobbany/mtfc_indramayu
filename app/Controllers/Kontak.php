<?php

namespace App\Controllers;

use App\Models\KontakModel;

class Kontak extends BaseController
{
    public function index()
    {
        $data['title'] = 'Kontak';

        return view('kontak', $data);
    }

    public function admin_kontak()
    {
        $kontak = new KontakModel();
        $kontakData = $kontak->first();

        if ($kontakData) {
            $data['kontak'] = (object) array(
                'telepon' => $kontakData->telepon,
                'email' => $kontakData->email,
                'fb_url' => $kontakData->fb_url,
                'ig_url' => $kontakData->ig_url,
                'alamat' => $kontakData->alamat,
                'embed_map' => $kontakData->embed_map,
            );
        }

        $data['title'] = 'Kontak';

        return view('admin/kontak/index.php', $data);
    }

    public function edit_kontak()
    {
        $data['title'] = 'Edit Kontak';

        return view('admin/kontak/edit_kontak.php', $data);
    }

    public function save_kontak()
    {
        $kontak = new KontakModel();
        $data = [
            'telepon'   => $this->request->getVar('telepon'),
            'email'     => $this->request->getVar('email'),
            'fb_url'    => $this->request->getVar('fb_url'),
            'ig_url'    => $this->request->getVar('ig_url'),
            'alamat'    => $this->request->getVar('alamat'),
            'embed_map' => $this->request->getVar('embed_map'),
        ];
        $kontak->deleteData();
        $kontak->insert($data);
        session()->setFlashdata('success', 'Berhasil edit kontak');
        return redirect()->to(base_url('admin/kontak'));
    }

    public function hapus_kontak()
    {
        $kontak = new KontakModel();
        $kontak->deleteData();
        session()->setFlashdata('success', 'Berhasil hapus kontak');
        return redirect()->to(base_url('admin/kontak'));
    }
}
