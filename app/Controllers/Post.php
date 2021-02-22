<?php

namespace App\Controllers;

use App\Models\PostModel;

class Post extends BaseController
{
	protected $vista = 'post';

	public function index()
	{
		$model = new PostModel;
		$data['posts'] = $model->paginate(10);
        $data['pager'] = $model->pager;
		$data['vista'] = $this->vista;
		return view('Dashboard/Post/index', $data);
	}

	public function new()
	{
		$data['vista'] = $this->vista;
		return view('Dashboard/post/new', $data);
	}

	public function create()
	{
		$rules = [
			'post_nombre' => 'required|is_unique[post.post_nombre]'
		];
		$menssages = [
			'post_nombre' => [
				'required' => 'Debe ingresar el nombre de la categoría',
				'is_unique' => 'Ya existe una categoría con ese nombre'
			]
		];
		if (!$this->validate($rules, $menssages)) {
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to('post/new');
		} else {
			$datos = [
				'post_nombre' => $this->request->getVar('post_nombre'),
				'slug' => strtolower($this->eliminar_acentos($this->request->getVar('post_nombre')))
			];
			$model = new PostModel;
			$model->save($datos);
			session()->setFlashdata('success', "Nueva post registrada exitosamente " . $datos['post_nombre']);
			return redirect('post');
		}
	}

	function edit($id)
	{
		$data['vista'] = $this->vista;
		$model = new PostModel;
		$data['post'] = $model->find($id);
		return view('Dashboard/post/edit', $data);
	}

	public function update($id)
	{
		$rules = [
			'post_nombre' => "required|is_unique[post.post_nombre,id,$id]"
		];
		$menssages = [
			'post_nombre' => [
				'required' => 'Debe ingresar el nombre de la categoría',
				'is_unique' => 'Ya existe una categoría con ese nombre'
			]
		];
		if (!$this->validate($rules, $menssages)) {
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to('post/' . $id . '/edit');
		} else {
			$datos = [
				'post_nombre' => $this->request->getVar('post_nombre'),
				'slug' => strtolower($this->eliminar_acentos($this->request->getVar('post_nombre'))) //El slug es el mismo nombre pero en minusculas y sin tildes

			];
			$model = new PostModel;
			$model->update($id, $datos);
			session()->setFlashdata('success', "Registro #$id modificado exitosamente");
			return redirect('post');
		}
	}

	public function delete($id)
	{
		$model = new PostModel;
		$post = $model->find($id);
		if ($post['activo'] == 1) {
			$model->update($id, ['activo' => 0]);
			session()->setFlashdata('success', "Registro #$id desactivado exitosamente");
		} else {
			$model->update($id, ['activo' => 1]);
			session()->setFlashdata('success', "Registro #$id activado exitosamente");
		}
		return redirect('post');
	}

}
