<?php

namespace App\Controllers;

use App\Models\SesionModel;
use App\Models\UsuarioModel;

class Login extends BaseController
{
	public function index()
	{
		$data=[];
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'username' => 'required',
				'password' => 'required|validateUser[username,password]',
			];
			$messages = [
				'password' => [
					'validateUser' => 'Credenciales incorrectas, intentelo nuevamente.',
					'required' => 'Ingrese la contraseña'
				],

				'username' => [
					'required' => 'Ingrese el nombre de usuario'
				]
			];
			if (!$this->validate($rules, $messages)) {
				$data['validation'] = $this->validator;
			} else {
				$model = new UsuarioModel();
				$user = $model->where('username', $this->request->getPost('username'))
					->first();
				$this->setUserSession($user);
				return redirect()->route('/');
			}
		}
		return view('login',$data);
	}


	private function setUserSession($user)
	{
		$data = [
			'id' => $user['id'],
			'username' => $user['username'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];
		session()->set($data);

		$model = new SesionModel();
		$data = [
			'ip_address' => $this->request->getIPAddress(),
			'usuario_id' => $user['id'],
			'create_at' => date('Y-m-d H:i:s')
		];
		
		$model->save($data);
		return true;
	}


	public function logout() {
	    session()->destroy();
	    return redirect()->route('login');
	}
}
