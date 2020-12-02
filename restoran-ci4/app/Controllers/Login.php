<?php

namespace App\Controllers;

use App\Models\Model_Kategori;
use App\Models\Model_Menu;
use App\Models\Model_Pelanggan;

class Login extends BaseController
{
	public function index()
	{
		$data = [];
		if ($this->request->getMethod() == 'post') {
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');

			$model = new Model_Pelanggan();
			$pelanggan = $model->where(['email' => $email, 'aktif' => 1])->first();

			if (empty($pelanggan)) {
				$data['info'] = "Email Salah !";
			} else {
				if ($password == $pelanggan['password']) {
					$this->setSession($pelanggan);
					return redirect()->to(base_url("/home"));
				} else {
					$data['info'] = "Password Salah !";
				}
			}
		} else {
			# code...
		}
		return view('login', $data);
	}

	public function setSession($pelanggan)
	{
		$data = [
			'idpelanggan'	=> $pelanggan['idpelanggan'],
			'pelanggan' 	=> $pelanggan['pelanggan'],
			'email' 		=> $pelanggan['email'],
			'userLoggedIn' 		=> true
		];

		session()->set($data);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url("/home"));
	}

	//--------------------------------------------------------------------

}
