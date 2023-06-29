<?php

namespace App\Controllers;

use App\Models\AdminModel;

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
        $data['title'] = 'Dashboard';

        return view('admin/dashboard', $data);
    }
}
