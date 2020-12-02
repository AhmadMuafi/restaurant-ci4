<?php

namespace App\Controllers;

use App\Models\Model_Kategori;
use App\Models\Model_Menu;
use App\Models\Model_Pelanggan;

class Daftar extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new Model_Kategori();
        $modelMenu = new Model_Menu();

        $menu = $modelMenu;

        $data = [
            'judul'         => 'KATEGORI',
            'kategori'         => $model->paginate(),
            'menu'            => $menu->paginate(3, 'page'),
            'pager'            => $menu->pager
        ];

        return view('daftar', $data);
    }

    public function insert()
    {
        if (isset($_POST['password'])) {
            $data = [
                'pelanggan'     => $_POST['pelanggan'],
                'alamat'        => $_POST['alamat'],
                'telp'          => $_POST['telp'],
                'email'         => $_POST['email'],
                'password'      => $_POST['password'],
                'konfirmasi'    => $_POST['konfirmasi'],
                'aktif'         => 1
            ];
            // var_dump($data);

            $model = new Model_Pelanggan();

            if ($model->insert($data) === false) {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(base_url("daftar"));
            } else {
                return redirect()->to(base_url("daftar/success"));
            }
        } else {
            return view('daftar');
        }
    }

    public function success()
    {
        $model = new Model_Kategori();

        $data = ['kategori' => $model->findAll()];
        return view('success', $data);
    }
}
