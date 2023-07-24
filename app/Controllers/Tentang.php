<?php

namespace App\Controllers;

use App\Models\KontakModel;
use App\Models\TimModel;
use App\Models\SematTimModel;
use App\Models\TentangModel;
use App\Models\PesanModel;

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

    public function admin_tentang()
    {
        $tentang = new TentangModel();
        $tentangData = $tentang->first();

        if ($tentangData) {
            $data['tentangData'] = (object) array(
                'tentang' => $tentangData->tentang,
                'footer' => $tentangData->footer,
            );
        }

        $pesanModel = new PesanModel();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();
        $data['title'] = 'Tentang';

        return view('admin/tentang/index.php', $data);
    }

    public function edit_tentang()
    {
        $data['title'] = 'Edit Tentang';
        $tentang = new TentangModel();
        $data['tentangData'] = $tentang->first();
        $pesanModel = new PesanModel();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/tentang/edit_tentang.php', $data);
    }

    public function save_tentang()
    {
        $tentang = new TentangModel();
        $data = [
            'tentang'   => $this->request->getVar('tentang'),
            'footer'     => $this->request->getVar('footer'),
        ];
        $tentang->deleteData();
        $tentang->insert($data);
        session()->setFlashdata('success', 'Berhasil edit tentang');
        return redirect()->to(base_url('admin/tentang'));
    }

    public function hapus_tentang()
    {
        $tentang = new TentangModel();
        $tentang->deleteData();
        session()->setFlashdata('success', 'Berhasil hapus tentang');
        return redirect()->to(base_url('admin/tentang'));
    }
}
