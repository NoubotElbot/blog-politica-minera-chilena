<?php

namespace App\Controllers;

use App\Models\PostModel;

class Post extends BaseController
{
	protected $vista = 'post';

	public function index()
	{
		$model = new PostModel;
		$data['posts'] = $model->orderBy('id', 'desc')->paginate(10);
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
			'titulo' => 'required|is_unique[post.titulo]',
			'subtitulo' => 'required',
			'contenido' => 'required',
			'portada' => 'uploaded[portada]|is_image[portada]'
		];
		$menssages = [
			'titulo' => [
				'required' => 'Debe ingresar el título',
				'is_unique' => 'Ya existe un post con ese título'
			],
			'subtitulo' => [
				'required' => 'Debe ingresar el subtítulo'
			],
			'contenido' => [
				'required' => 'Debe ingresar el contenido'
			],
		];
		if (!$this->validate($rules, $menssages)) {
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to('post/new');
		} else {
			$file = $this->request->getFile('portada');
			if ($file->isValid() && !$file->hasMoved()) {
				$name = $file->getRandomName();
				$file->move('./uploads', $name);
			}
			$datos = [
				'titulo' => $this->request->getPost('titulo'),
				'subtitulo' => $this->request->getPost('subtitulo'),
				'cuerpo' => $this->request->getPost('contenido'),
				'imagen' => 'uploads/' . $name,
				'usuario_id' => session()->get('id'),
				'slug' => preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($this->eliminar_acentos($_POST["titulo"])))),
			];
			$model = new PostModel;
			$model->save($datos);
			session()->setFlashdata('success', "Nueva post registrada exitosamente ");
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
			'titulo' => "required|is_unique[post.titulo,id,$id]",
			'subtitulo' => 'required',
			'contenido' => 'required',
		];
		$menssages = [
			'titulo' => [
				'required' => 'Debe ingresar el título',
				'is_unique' => 'Ya existe un post con ese título'
			],
			'subtitulo' => [
				'required' => 'Debe ingresar el subtítulo'
			],
			'contenido' => [
				'required' => 'Debe ingresar el contenido'
			]
		];
		if (!$this->validate($rules, $menssages)) {
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to('/post' . '/' . $id . '/edit');
		} else {
			$datos = [
				'titulo' => $this->request->getPost('titulo'),
				'subtitulo' => $this->request->getPost('subtitulo'),
				'cuerpo' => $this->request->getPost('contenido'),
				'usuario_id' => session()->get('id'),
				'slug' => preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($this->eliminar_acentos($_POST["titulo"])))),
			];
			
			$file = $this->request->getFile('portada');
			if ($file->isValid() && !$file->hasMoved()) {
				$name = $file->getRandomName();
				$file->move('./uploads', $name);
				$datos['imagen'] = 'uploads/' . $name;
			}

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
	protected function eliminar_acentos($cadena)
	{
		//Reemplazamos la A y a
		$cadena = str_replace(
			array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
			array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
			$cadena
		);

		//Reemplazamos la E y e
		$cadena = str_replace(
			array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
			array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
			$cadena
		);

		//Reemplazamos la I y i
		$cadena = str_replace(
			array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
			array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
			$cadena
		);

		//Reemplazamos la O y o
		$cadena = str_replace(
			array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
			array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
			$cadena
		);

		//Reemplazamos la U y u
		$cadena = str_replace(
			array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
			array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
			$cadena
		);

		//Reemplazamos la N, n, C y c
		$cadena = str_replace(
			array('Ñ', 'ñ', 'Ç', 'ç'),
			array('N', 'n', 'C', 'c'),
			$cadena
		);

		return $cadena;
	}
}
