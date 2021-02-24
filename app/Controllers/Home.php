<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CategoriaModel;

class Home extends BaseController
{
	public function index()
	{
		$postModel = new PostModel;
		$data['lastPost'] = $postModel
			->where('post.activo', 1)
			->orderBy('id', 'desc')
			->first();
		$data['postSegundoTercero'] = $postModel
			->where('post.activo', 1)
			->where('post.id < (SELECT max(id) from post)')
			->orderBy('id', 'desc')
			->findAll(2);
		$data['postCuartoQuinto'] = $postModel
			->where('post.activo', 1)
			->where('post.id < (SELECT max(id)-2 from post)')
			->orderBy('id', 'desc')
			->findAll(2);
		return view('home', $data);
	}
}
