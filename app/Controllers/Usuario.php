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
			->orderBy('id', 'desc')
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
            if($this->request->getPost('password')){
                $rules['password'] = 'validateUser[username,password]';
                $rules['new-password'] = 'required|min_length[8]';
                $rules['password-confirm'] = 'required|matches[new-password]';
            }
			if (!$this->validate($rules, $menssages)) {
				$data['validation'] = $this->validator;
			} else {
				$datos = [
					'email' => $this->request->getPost('email'),
				];
                if($this->request->getPost('password')){
                    $datos['password'] = $this->request->getPost('new-password');
                }
				$model = new UsuarioModel;
				$model->update($id, $datos);
				session()->setFlashdata('success', "Registro #$id modificado exitosamente");
				return redirect('usuario');
			}
		}
		$data['vista'] = $this->vista;
		$model = new UsuarioModel;
		$data['usuario'] = $model->find($id);
		return view('Dashboard/Usuario/edit', $data);
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
