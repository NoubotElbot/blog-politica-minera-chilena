<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CategoriaModel;

class Home extends BaseController
{
	public function index()
	{
		$postModel = new PostModel;
		if ($this->request->getGet('buscar')) {
			$key = $this->request->getGet('buscar');
			$data['posts'] = $postModel
				->where('post.activo', 1)
				->where('titulo like "%'.$key.'%"')
				->orderBy('id', 'desc')
				->paginate(3);
			$data['pager'] = $postModel->pager;
			$data['key'] = $key;
		} else {
			$data['lastPost'] = $postModel
				->where('post.activo', 1)
				->orderBy('id', 'desc')
				->first();
			$data['postSegundoTercero'] = $postModel
				->where('post.activo', 1)
				->where('post.id < (SELECT max(id) from post where activo = 1)')
				->orderBy('id', 'desc')
				->findAll(2);
			$data['postCuartoQuinto'] = $postModel
				->where('post.activo', 1)
				->where('post.id < (SELECT max(id)-2 from post where activo = 1)')
				->orderBy('id', 'desc')
				->findAll(2);
		}
		$categoriaModel = new CategoriaModel;
		$data['categorias'] = $categoriaModel->findAll();
		return view('home', $data);
	}

	public function somos()
	{
		$categoriaModel = new CategoriaModel;
		$data['categorias'] = $categoriaModel->findAll();
		return view('somos', $data);
	}
}
