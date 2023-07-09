<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\KontakModel;
use App\Models\TimModel;
use App\Models\GaleriModel;
use App\Models\BeritaModel;
use App\Models\KomentarBeritaModel;
use App\Models\SubkomentarBeritaModel;
use App\Models\PesanModel;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/index.php');
    }

    public function login()
    {
        $admin = new AdminModel();
        $id = $this->request->getVar('id');
        $kata_sandi = $this->request->getVar('kata_sandi');
        $dataAdmin = $admin->where([
            'id' => $id,
        ])->first();
        if ($dataAdmin) {
            if ($kata_sandi == $dataAdmin->kata_sandi) {
                session()->set([
                    'id' => $dataAdmin->id,
                    'nama' => $dataAdmin->nama,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('admin/dashboard'));
            } else {
                session()->setFlashdata('error', 'Kata sandi salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'ID tidak ditemukan');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin'));
    }

    public function dashboard()
    {
        $kontakModel = new KontakModel();
        $timModel = new TimModel();
        $galeriModel = new GaleriModel();
        $beritaModel = new BeritaModel();
        $komentarModel = new KomentarBeritaModel();
        $subKomentarModel = new SubkomentarBeritaModel();
        $pesanModel = new PesanModel();

        $data['title'] = 'Dashboard';
        $data['kontak'] = $kontakModel->first();
        $data['tim'] = $timModel->getData();
        $data['galeri'] = $galeriModel->getData();
        $data['berita'] = $beritaModel->getData();
        $data['komentar'] = $komentarModel->getData()->get()->getResult();
        $data['subkomentar'] = $subKomentarModel->getData();
        $data['pesan'] = $pesanModel->getData();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/dashboard', $data);
    }
}
