<?php

namespace App\Controllers;

use App\Models\Model_Kategori;
use App\Models\Model_Menu;

class Cart extends BaseController
{

    public function index()
    {
        $cart = \Config\Services::cart();
        $model = new Model_Kategori();

        $data = [
            'judul'         => 'KATEGORI',
            'kategori'      => $model->findAll(),
            'cart'          => $cart
        ];

        return view('cart', $data);
    }

    public function buy($id = null)
    {
        $cart = $cart = \Config\Services::cart();
        $model = new Model_Menu();
        $menu = $model->find($id);

        $data = [
            'id'      => $menu['idmenu'],
            'qty'     => 1,
            'name'    => $menu['menu'],
            'price'   => $menu['harga'],
            'gambar'  => $menu['gambar']
        ];

        $cart->insert($data);
        return redirect()->to(base_url('/cart'));
    }

    public function tambah($qty, $id)
    {
        $cart = $cart = \Config\Services::cart();
        $jumlah = $qty + 1;
        $data = [
            'rowid'     => $id,
            'qty'       => $jumlah
        ];

        $cart->update($data);
        return redirect()->to(base_url('/cart'));
    }

    public function kurang($qty, $id)
    {
        $cart = $cart = \Config\Services::cart();
        $jumlah = $qty - 1;
        $data = [
            'rowid'     => $id,
            'qty'       => $jumlah
        ];

        if ($qty < 2) {
            return redirect()->to(base_url('/cart/remove/' . $id));
        } else {
            $cart->update($data);
        }

        return redirect()->to(base_url('/cart'));
    }

    public function remove($id)
    {
        $cart = \Config\Services::cart();
        $rowid = $id;
        $cart->remove($rowid);
        return redirect()->to(base_url('/cart'));
    }

    public function checkout()
    {
        $cart = \Config\Services::cart();
        $db = \Config\Database::connect();
        $model = new Model_Kategori();

        date_default_timezone_set('Asia/Jakarta');
        $idpelanggan = session()->get('idpelanggan');
        $order = [
            'idpelanggan'   => $idpelanggan,
            'tglorder'      => date('Y-m-d'),
            'total'         => $cart->total(),
            'bayar'         => 0,
            'kembali'       => 0,
            'status'        => 0
        ];
        $db->table('tblorder')->insert($order);

        $idorder = $db->insertID();
        foreach ($cart->contents() as $key) {
            $orderdetail = [
                'idorder'   => $idorder,
                'idmenu'    => $key['id'],
                'jumlah'    => $key['qty'],
                'hargajual' => $key['price']
            ];
            $db->table('tblorderdetail')->insert($orderdetail);
        }

        $data = [
            'judul'         => 'KATEGORI',
            'kategori'      => $model->findAll(),
            'cart'          => $cart
        ];

        $cart->destroy();

        return view('checkout', $data);
    }
}
