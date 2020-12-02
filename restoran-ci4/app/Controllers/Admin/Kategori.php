<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_Kategori;

class Kategori extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		echo "<h1>Belajar CodeIgniter 4</h1>";
	}

	public function select()
	{
		$pager = \Config\Services::pager();
		$model = new Model_Kategori();

		$data = [
			'judul' => 'DATA KATEGORI',
			'kategori' => $model->paginate(3, 'page'),
			'pager' => $model->pager
		];

		return view("kategori/select", $data);
	}

	public function create()
	{
		return view("kategori/insert");
	}

	public function insert()
	{
		$model = new Model_Kategori();

		if ($model->insert($_POST) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error['kategori']);
			return redirect()->to(base_url("/admin/kategori/create"));
		} else {
			return redirect()->to(base_url("/admin/kategori"));
		}
	}

	public function find($id = null)
	{
		$model = new Model_Kategori();
		$kategori = $model->find($id);

		$data = [
			'judul' => 'UPDATE DATA',
			'kategori' => $kategori
		];

		return view("kategori/update", $data);
	}

	public function update()
	{
		$model = new Model_Kategori();
		$id = $_POST['idkategori'];

		if ($model->save($_POST) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error['kategori']);
			return redirect()->to(base_url("/admin/kategori/find/$id"));
		} else {
			return redirect()->to(base_url("/admin/kategori"));
		}
	}

	public function delete($id = null)
	{
		$model = new Model_Kategori();
		$model->delete($id);

		return redirect()->to(base_url("/admin/kategori"));
	}

	//--------------------------------------------------------------------

}
