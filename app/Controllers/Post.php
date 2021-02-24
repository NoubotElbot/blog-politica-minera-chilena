<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\CategoriaPostModel;
use App\Models\PostModel;

class Post extends BaseController
{
	protected $vista = 'post';

	public function index()
	{
		$model = new PostModel;
		$data['posts'] = $model
			->orderBy('id', 'desc')
			->paginate(10);
		$data['pager'] = $model->pager;
		$model = new CategoriaModel;
		$data['categorias'] = $model->select('categoria.categoria_nombre, categoria_post.post_id')
			->join('categoria_post', 'categoria_id = categoria.id', 'left')
			->findAll();
		$data['vista'] = $this->vista;
		return view('Dashboard/Post/index', $data);
	}

	public function create()
	{
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'titulo' => 'required|is_unique[post.titulo]',
				'subtitulo' => 'required',
				'contenido' => 'required',
				'portada' => 'uploaded[portada]|is_image[portada]|ext_in[portada,png,jpg]',
				'categoria' => 'required'
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
				'categoria' => [
					'required' => 'Debe seleccionar una o mas categorias'
				],
				'portada' => [
					'uploaded' => 'Debe subir una imagen para la portada',
					'is_image' => 'El archivo subido debe ser una imagen',
					'ext_in' => 'Portada no tiene una extensión valida (png,jpg)'
				]
			];
			if (!$this->validate($rules, $menssages)) {
				$data['validation'] = $this->validator;
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
				//Relacionar categorias
				$id = $model->selectMax('id')->first(); //ID del nuevo post

				$categoriaPostModel = new CategoriaPostModel();
				$categorias = $this->request->getPost('categoria');
				foreach ($categorias as $categoria) {
					$categoriaPostModel->save(
						[
							'categoria_id' => $categoria,
							'post_id' => $id['id']
						]
					);
				}
				//Fin
				session()->setFlashdata('success', "Nueva post registrada exitosamente ");
				return redirect('post');
			}
		}
		$data['vista'] = $this->vista;
		$model = new CategoriaModel();
		$data['categorias'] = $model->where('activo', 1)->findAll();
		return view('Dashboard/post/new', $data);
	}

	public function edit($id)
	{
		if ($this->request->getMethod() == 'post') {

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
			if ($this->request->getFile('portada')) {
				$rules['portada'] = 'is_image[portada]|ext_in[portada,png,jpg]';
				$menssages['portada'] = [
					'is_image' => 'El archivo subido debe ser una imagen',
					'ext_in' => 'Portada no tiene una extensión valida (png,jpg)'
				];
			}
			if (!$this->validate($rules, $menssages)) {
				$data['validation'] = $this->validator;
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
				//Relacionar categorias
				$categoriaPostModel = new CategoriaPostModel();
				$categoriaPostModel->where('post_id', $id)->delete();
				$categorias = $this->request->getPost('categoria');
				foreach ($categorias as $categoria) {
					$categoriaPostModel->save(
						[
							'categoria_id' => $categoria,
							'post_id' => $id
						]
					);
				}
				session()->setFlashdata('success', "Registro #$id modificado exitosamente");
				return redirect('post');
			}
		}
		$data['vista'] = $this->vista;
		$model = new CategoriaModel();
		$data['categorias'] = $model->findAll();
		$model = new PostModel;
		$data['post'] = $model->find($id);
		$model = new CategoriaPostModel;
		$data['categoria_post'] = $model->where('post_id', $id)->findAll();
		return view('Dashboard/post/edit', $data);
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
