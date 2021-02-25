<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CategoriaModel;

class Dashboard extends BaseController
{
	public function index()
	{
		$model = new PostModel;
		$data['posts'] = $model
			->orderBy('id', 'desc')
			->findAll(10);
		$model = new CategoriaModel;
		$data['categorias_post'] = $model->select('categoria.categoria_nombre, categoria_post.post_id')
			->join('categoria_post', 'categoria_id = categoria.id', 'left')
			->findAll();
		$data['categorias'] = $model->findAll();
		$data['vista'] = 'dashboard';
		return view('Dashboard/index', $data);
	}
}
