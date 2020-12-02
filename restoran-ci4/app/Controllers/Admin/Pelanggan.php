<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_Pelanggan;

class Pelanggan extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new Model_Pelanggan();

        $data = [
            'judul' => 'DATA PELANGGAN',
            'pelanggan' => $model->paginate(3, 'page'),
            'pager' => $model->pager
        ];

        return view("pelanggan/select", $data);
    }

    public function update($id = null, $isi = 1)
    {
        $model = new Model_Pelanggan();
        if ($isi == 0) {
            $isi = 1;
        } else {
            $isi = 0;
        }

        $data = [
            'aktif' => $isi
        ];

        $model->update($id, $data);
        return redirect()->to(base_url("/admin/pelanggan"));
    }

    public function delete($id = null)
    {
        $model = new Model_Pelanggan();
        $model->delete($id);

        return redirect()->to(base_url("/admin/pelanggan"));
    }

    //--------------------------------------------------------------------

}
