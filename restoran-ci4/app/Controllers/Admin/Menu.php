<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_Kategori;
use App\Models\Model_Menu;

class Menu extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new Model_Menu();

        $data = [
            'judul' => 'DATA MENU',
            'menu' => $model->paginate(3, 'page'),
            'pager' => $model->pager
        ];

        return view("menu/select", $data);
    }

    public function select()
    {
        $pager = \Config\Services::pager();

        if (isset($_GET['idkategori'])) {
            $id = $_GET['idkategori'];

            $model = new Model_Menu();
            $jumlah = $model->where('idkategori', $id)->findAll();
            $count = count($jumlah);

            $tampil = 3;
            $mulai = 0;

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $mulai = ($tampil * $page) - $tampil;
            }

            $menu = $model->where('idkategori', $id)->findAll($tampil, $mulai);

            $data = [
                'judul' => 'DATA PENCARIAN MENU',
                'menu' => $menu,
                'pager' => $pager,
                'tampil' => $tampil,
                'total' => $count
            ];

            return view("menu/cari", $data);
        }
    }

    public function create()
    {
        $model = new Model_Kategori();
        $kategori = $model->findAll();

        $data = [
            'kategori' => $kategori,
        ];
        return view("menu/insert", $data);
    }

    public function insert()
    {
        $request = \Config\Services::request();
        $file = $request->getFile('gambar');
        $name = $file->getName();

        $data = [
            'idkategori' => $request->getPost('idkategori'),
            'menu' => $request->getPost('menu'),
            'gambar' => $name,
            'harga' => $request->getPost('harga')
        ];

        $model = new Model_Menu();

        if ($model->insert($data) === false) {
            $error = $model->errors();
            session()->setFlashdata('info', $error);
            return redirect()->to(base_url("/admin/menu/create"));
        } else {
            $file->move('./upload');
            return redirect()->to(base_url("/admin/menu"));
        }
    }

    public function find($id = null)
    {
        $model = new Model_Menu();
        $menu = $model->find($id);


        $modelKategori = new Model_Kategori();
        $kategori = $modelKategori->findAll();

        // print_r($menu);
        $data = [
            'judul' => 'UPDATE DATA',
            'menu' => $menu,
            'kategori' => $kategori
        ];

        return view("menu/update", $data);
    }

    public function update()
    {

        // $request = \Config\Services::request();
        // $idmenu = $_POST['idmenu'];
        // $file = $request->getFile('gambar');
        // $name = $file->getName();

        // if (empty($name)) {
        //     $name = $request->getPost('gambar');
        // } else {
        //     $file->move('./upload');
        // }

        // $idkategori = $_POST['idkategori'];
        // $menu = $_POST['menu'];
        // $gambar = $name;
        // $harga = $_POST['harga'];

        // $sql = "UPDATE tblmenu SET idkategori='$idkategori', menu='$menu', gambar='$gambar', harga=$harga WHERE idmenu=$idmenu";
        // $db = \Config\Database::connect();
        // $db->query($sql);

        // $model = new Model_Menu();

        // if ($sql === false) {
        //     $error = $model->errors();
        //     session()->setFlashdata('info', $error);
        //     return redirect()->to(base_url("/admin/menu/find/$idmenu"));
        // } else {
        //     return redirect()->to(base_url("/admin/menu"));
        // }

        /* Ngebug gak bisa update 1 item harus ubah menu baru bisa */
        $id = $this->request->getPost('idmenu');
        $file = $this->request->getFile('gambar');
        $name = $file->getName();

        if (empty($name)) {
            $name = $this->request->getPost('gambar');
        } else {
            $file->move('./upload');
        }

        $data = [
            'idkategori'    => $this->request->getPost('idkategori'),
            'menu'          => $this->request->getPost('menu'),
            'gambar'        => $name,
            'harga'         => $this->request->getPost('harga')
        ];

        $model = new Model_Menu();
        $model->update($id, $data);
        return redirect()->to(base_url("/admin/menu"));

        if ($model->update($id, $data) === false) {
            $error = $model->errors();
            session()->setFlashdata('info', $error);
            return redirect()->to(base_url("/admin/menu/find/$id"));
        } else {
            return redirect()->to(base_url("/admin/menu"));
        }
    }

    public function option()
    {
        $model = new Model_Kategori();
        $kategori = $model->findAll();

        $data = [
            'kategori' => $kategori,
        ];

        return view('template/option', $data);
    }

    public function delete($id = null)
    {
        $model = new Model_Menu();
        $model->delete($id);

        return redirect()->to(base_url("/admin/menu"));
    }

    //--------------------------------------------------------------------

}
