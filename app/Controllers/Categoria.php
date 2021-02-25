<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CategoriaModel;

class Categoria extends BaseController
{
	protected $vista = 'categoria';

	public function index()
	{
		$model = new CategoriaModel;
		$data['categorias'] = $model->findAll();
		$data['vista'] = $this->vista;
		return view('Dashboard/Categoria/index', $data);
	}
	//post por categorias
	public function show($slug){
		$model = new PostModel;
		$data['posts'] = $model->select('post.*')
		->join('categoria_post','post.id = categoria_post.post_id')
		->join('categoria','categoria.id = categoria_post.categoria_id')
		->where('categoria.slug',$slug)
		->paginate(2);
		$data['pager'] = $model->pager;
		$model = new CategoriaModel();
		$data['vista'] =  $model->select('categoria_nombre')->where('slug',$slug)->first();
		$data['categorias'] = $model->findAll();
		return view('Dashboard/Categoria/show', $data);
	}

	public function new()
	{
		$data['vista'] = $this->vista;
		return view('Dashboard/categoria/new', $data);
	}

	public function create()
	{
		$rules = [
			'categoria_nombre' => 'required|is_unique[categoria.categoria_nombre]'
		];
		$menssages = [
			'categoria_nombre' => [
				'required' => 'Debe ingresar el nombre de la categoría',
				'is_unique' => 'Ya existe una categoría con ese nombre'
			]
		];
		if (!$this->validate($rules, $menssages)) {
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to('categoria/new');
		} else {
			$datos = [
				'categoria_nombre' => $this->request->getVar('categoria_nombre'),
				'slug' => strtolower($this->eliminar_acentos($this->request->getVar('categoria_nombre')))
			];
			$model = new CategoriaModel;
			$model->save($datos);
			session()->setFlashdata('success', "Nueva categoria registrada exitosamente " . $datos['categoria_nombre']);
			return redirect('categoria');
		}
	}

	function edit($id)
	{
		$data['vista'] = $this->vista;
		$model = new CategoriaModel;
		$data['categoria'] = $model->find($id);
		return view('Dashboard/categoria/edit', $data);
	}

	public function update($id)
	{
		$rules = [
			'categoria_nombre' => "required|is_unique[categoria.categoria_nombre,id,$id]"
		];
		$menssages = [
			'categoria_nombre' => [
				'required' => 'Debe ingresar el nombre de la categoría',
				'is_unique' => 'Ya existe una categoría con ese nombre'
			]
		];
		if (!$this->validate($rules, $menssages)) {
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to('categoria/' . $id . '/edit');
		} else {
			$datos = [
				'categoria_nombre' => $this->request->getVar('categoria_nombre'),
				'slug' => strtolower($this->eliminar_acentos($this->request->getVar('categoria_nombre'))) //El slug es el mismo nombre pero en minusculas y sin tildes

			];
			$model = new CategoriaModel;
			$model->update($id, $datos);
			session()->setFlashdata('success', "Registro #$id modificado exitosamente");
			return redirect('categoria');
		}
	}

	public function delete($id)
	{
		$model = new CategoriaModel;
		$categoria = $model->find($id);
		if ($categoria['activo'] == 1) {
			$model->update($id, ['activo' => 0]);
			session()->setFlashdata('success', "Registro #$id desactivado exitosamente");
		} else {
			$model->update($id, ['activo' => 1]);
			session()->setFlashdata('success', "Registro #$id activado exitosamente");
		}
		return redirect('categoria');
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
