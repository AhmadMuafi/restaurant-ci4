<?php

namespace App\Controllers;

use App\Models\Model_Kategori;
use App\Models\Model_OrderDetail;

class Histori extends BaseController
{
    public function index($idpelanggan = null)
    {
        $cart = \Config\Services::cart();
        $model = new Model_Kategori();
        $order = new Model_OrderDetail();
        $orderdetail = $order->where('idpelanggan', $idpelanggan)->orderBy('tglorder', 'desc')->findAll();

        $data = [
            'cart'          => $cart,
            'kategori'      => $model->findAll(),
            'order'         => $orderdetail
        ];

        return view('histori', $data);
    }
}
