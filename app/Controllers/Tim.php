<?php

namespace App\Controllers;

use App\Models\KontakModel;
use App\Models\TimModel;
use App\Models\SematTimModel;
use App\Models\PesanModel;

class Tim extends BaseController
{
    public function index($index)
    {
        $kontakData = new KontakModel();
        $timData = new TimModel();
        $sematTimData = new SematTimModel();
        $data['kontak'] = $kontakData->first();
        $data['tim'] = $timData->getNoSematData();
        $data['tim_semat'] = $sematTimData->getData();
        $data['index'] = $index;
        $data['title'] = 'Tim Kami';

        return view('tim', $data);
    }

    public function admin_tim($index)
    {
        $timData = new TimModel();
        $sematTimData = new SematTimModel();
        $data['tim'] = $timData->getData();
        $data['tim_semat'] = $sematTimData->getData();
        $data['title'] = 'Tim';
        $data['index'] = $index;
        $pesanModel = new PesanModel();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/tim/index.php', $data);
    }

    public function tambah_tim()
    {
        $data['title'] = 'Tambah Anggota Tim';
        $pesanModel = new PesanModel();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/tim/tambah_tim.php', $data);
    }

    public function edit_tim($id)
    {
        $timData = new TimModel();
        $data['tim'] = (object) $timData->where('id_tim', $id)->first();
        $data['title'] = 'Edit Anggota Tim';
        $pesanModel = new PesanModel();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/tim/edit_tim.php', $data);
    }

    public function edit_semat()
    {
        $timData = new TimModel();
        $sematTimData = new SematTimModel();
        $data['tim_semat'] = $sematTimData->getDataID();
        $data['tim'] = $timData->getData();
        $data['title'] = 'Sematkan Anggota Tim';
        $pesanModel = new PesanModel();
        $data['pesan_notif'] = $pesanModel->getDataBelumDilihat();

        return view('admin/tim/edit_semat.php', $data);
    }

    public function add_tim()
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

        $tim = new TimModel();
        $dataFoto = $this->request->getFile('foto');
        $fileName = $dataFoto->getRandomName();

        $tim->insert([
            'foto' => $fileName,
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
        ]);

        $dataFoto->move('upload/image/tim/', $fileName);
        session()->setFlashdata('success', 'Berhasil menambah anggota tim');
        return redirect()->to(base_url('admin/tim/1'));
    }

    public function save_semat()
    {
        $sematTim = new SematTimModel();
        if ($this->request->getPost('anggota_1') !== '0') {
            $data[] = [
                'urutan' => 1,
                'id_anggota_tim'  => $this->request->getPost('anggota_1'),
            ];
        }
        if ($this->request->getPost('anggota_2') !== '0') {
            $data[] = [
                'urutan' => 2,
                'id_anggota_tim'  => $this->request->getPost('anggota_2'),
            ];
        }
        if ($this->request->getPost('anggota_3') !== '0') {
            $data[] = [
                'urutan' => 3,
                'id_anggota_tim'  => $this->request->getPost('anggota_3'),
            ];
        }
        if ($this->request->getPost('anggota_4') !== '0') {
            $data[] = [
                'urutan' => 4,
                'id_anggota_tim'  => $this->request->getPost('anggota_4'),
            ];
        }
        $sematTim->deleteData();
        if (isset($data)) {
            $sematTim->saveData($data);
            session()->setFlashdata('success', 'Berhasil menyematkan anggota tim');
            return redirect()->to(base_url('admin/tim/1'));
        } else {
            session()->setFlashdata('danger', 'Tidak ada data yg dipilih');
            return redirect()->to(base_url('admin/tim/edit_semat'));
        }
    }

    public function save_tim($id)
    {
        $tim = new TimModel();

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
                'nama' => $this->request->getPost('nama'),
                'jabatan' => $this->request->getPost('jabatan'),
            ];

            $dataFoto->move('upload/image/tim/', $fileName);
        } else {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'jabatan' => $this->request->getPost('jabatan'),
            ];
        }

        if ($tim->update($id, $data)) {
            session()->setFlashdata('success', 'Berhasil update data anggota tim');
            return redirect()->to(base_url('admin/tim/1'));
        }
    }

    public function hapus_tim($id)
    {
        $tim = new TimModel();
        $sematTim = new SematTimModel();

        if ($tim->find($id)) {
            $sematTim->where('id_anggota_tim', $id)->delete();
            $tim->delete($id);
            session()->setFlashdata('success', 'Berhasil hapus data anggota tim');
            return redirect()->to(base_url('admin/tim/1'));
        }
    }

    public function hapus_semua_tim()
    {
        $timData = new TimModel();
        $timData->deleteData();
        session()->setFlashdata('success', 'Berhasil hapus tim');
        return redirect()->to(base_url('admin/tim/1'));
    }
}
