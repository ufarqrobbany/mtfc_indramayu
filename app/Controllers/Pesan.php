<?php

namespace App\Controllers;

use App\Models\PesanModel;

class Pesan extends BaseController
{
    public function index($index)
    {
        $pesanModel = new PesanModel();
        $data['pesan'] = $pesanModel->getData();
        $data['index'] = $index;
        $data['title'] = 'Pesan';
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/pesan/index.php', $data);
    }

    public function add_pesan()
    {
        $pesanModel = new PesanModel();

        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        $pesanModel->insert([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'subjek' => $this->request->getPost('subjek'),
            'pesan' => $this->request->getPost('pesan'),
            'waktu' => $now
        ]);

        session()->setFlashdata('success', 'Berhasil kirim pesan');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function view_pesan($id)
    {
        $pesanModel = new PesanModel();
        $data['pesan'] = $pesanModel->where('id_pesan', $id)->first();
        $data['title'] = 'Lihat Pesan';

        $pesanModel->update($id, [
            'dilihat' => true,
        ]);

        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();
        return view('admin/pesan/view_pesan.php', $data);
    }

    public function hapus_pesan($id)
    {
        $pesan = new PesanModel();

        if ($pesan->find($id)) {
            $pesan->delete($id);
            session()->setFlashdata('success', 'Berhasil hapus pesan');
            return redirect()->to(base_url('admin/pesan/1'));
        }
    }

    public function hapus_semua_pesan()
    {
        $pesanModel = new PesanModel();
        $pesanModel->deleteData();
        session()->setFlashdata('success', 'Berhasil hapus pesan');
        return redirect()->to(base_url('admin/pesan/1'));
    }
}
