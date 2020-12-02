<?php

namespace App\Controllers;

use App\Controllers\Admin\Kategori;
use App\Models\Model_Kategori;
use App\Models\Model_Menu;

class Home extends BaseController
{
	public function index()
	{
		$cart = \Config\Services::cart();
		$pager = \Config\Services::pager();
		$model = new Model_Kategori();
		$modelMenu = new Model_Menu();

		$menu = $modelMenu;

		$data = [
			'judul' 		=> 'KATEGORI',
			'kategori' 		=> $model->paginate(),
			'menu'			=> $menu->paginate(3, 'page'),
			'pager'			=> $menu->pager,
			'cart'			=> $cart
		];

		return view("home", $data);
	}

	public function select($id)
	{
		$pager = \Config\Services::pager();
		$cart = \Config\Services::cart();

		$model = new Model_Kategori();
		$modelMenu = new Model_Menu();

		$jumlah = $modelMenu->where('idkategori', $id)->findAll();
		$count = count($jumlah);

		$tampil = 3;
		$mulai = 0;

		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			$mulai = ($tampil * $page) - $tampil;
		}

		$menu = $modelMenu->where('idkategori', $id)->findAll($tampil, $mulai);

		$data = [
			'judul' 		=> 'DAFTAR MENU',
			'kategori' 		=> $model->findAll(),
			'menu'			=> $menu,
			'pager'			=> $pager,
			'tampil'		=> $tampil,
			'total'			=> $count,
			'cart'			=> $cart
		];

		return view("cari", $data);
	}







	//--------------------------------------------------------------------

}
