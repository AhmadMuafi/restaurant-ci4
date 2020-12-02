<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_Kategori;

class Menu extends BaseController
{
	public function index()
	{
		return view('menu/form');
	}

	public function insert()
	{
		$file = $this->request->getFile('gambar');
		$name = $file->getName();
		$file->move('./upload');

		echo $name . " sudah diupload";
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

	//--------------------------------------------------------------------

}
