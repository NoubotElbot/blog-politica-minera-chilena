<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Usuario extends BaseController
{
	protected $vista = 'usuario';

	public function index()
	{
		$model = new UsuarioModel;
		$data['usuarios'] = $model
			->paginate(10);
		$data['pager'] = $model->pager;
		$data['vista'] = $this->vista;
		return view('Dashboard/Usuario/index', $data);
	}
	// public function show($slug)
	// {

	// }

	// public function create()
	// {
	// 	if ($this->request->getMethod() == 'post') {
	// 		$rules = [
	// 		];
	// 		$menssages = [
	// 		];
	// 		if (!$this->validate($rules, $menssages)) {
	// 			$data['validation'] = $this->validator;
	// 		} else {
	// 			$datos = [];
	// 			$model = new UsuarioModel();
	// 			$model->save($datos);
	// 			session()->setFlashdata('success', "Nueva Usuario registrada exitosamente ");
	// 			return redirect('usuario');
	// 		}
	// 	}
	// 	$data['vista'] = $this->vista;
	// 	return view('Dashboard/usuario/new', $data);
	// }

	public function edit($id)
	{
		if ($this->request->getMethod() == 'post') {

			$rules = [
				'email' => 'required|valid_email',
			];
			$menssages = [
				'email' => [
					'required' => 'Debe ingresar su correo electronico',
					'valid_email' => 'Debe ingresar un email valido'
				],
			];
			if ($this->request->getPost('password')) {
				$rules['password'] = 'validateUser[username,password]';
				$rules['new-password'] = 'required|min_length[8]';
				$rules['password-confirm'] = 'required|matches[new-password]';
				$menssages['password'] = [
					'validateUser' => 'La contraseña no es correcta'
				];
				$menssages['new-password'] = [
					'required' => 'Debe ingresar la nueva contraseña',
					'min_length' => 'Su contraseña debe tener minimo 8 caracteres'
				];
				$menssages['password-confirm'] = [
					'required' => 'Debe confirmar su contraseña',
					'matches' => 'La contraseña no coincide'
				];
			}
			if (!$this->validate($rules, $menssages)) {
				$data['validation'] = $this->validator;
			} else {
				$datos = [
					'email' => $this->request->getPost('email'),
				];
				if ($this->request->getPost('password')) {
					$datos['password'] = $this->request->getPost('new-password');
				}
				$model = new UsuarioModel;
				$model->update($id, $datos);
				session()->setFlashdata('success', "Registro #$id modificado exitosamente");
				return redirect('usuario');
			}
		}
		if (session()->get('id') == $id) {
			$data['vista'] = $this->vista;
			$model = new UsuarioModel;
			$data['usuario'] = $model->find($id);
			return view('Dashboard/Usuario/edit', $data);
		}else{
			return redirect()->back();
		}
	}

	// public function delete($id)
	// {
	// 	$model = new UsuarioModel;
	// 	$usuario = $model->find($id);
	// 	if ($usuario['activo'] == 1) {
	// 		$model->update($id, ['activo' => 0]);
	// 		session()->setFlashdata('success', "Registro #$id desactivado exitosamente");
	// 	} else {
	// 		$model->update($id, ['activo' => 1]);
	// 		session()->setFlashdata('success', "Registro #$id activado exitosamente");
	// 	}
	// 	return redirect('usuario');
	// }
}
