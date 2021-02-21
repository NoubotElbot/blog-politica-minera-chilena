<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{
	public function index()
	{
		$postModel = new PostModel;
		$data['lastPosts'] = $postModel
			->select('post.*, categoria.categoria_nombre')
			->join('categoria_post', 'post.id = categoria_post.post_id','left')
			->join('categoria', 'categoria.id = categoria_post.categoria_id','left')
			->findAll(2);
		$data['lastPostsByCategory'] = $postModel
			->select('post.*, categoria.categoria_nombre')
			->join('categoria_post', 'post.id = categoria_post.post_id','left')
			->join('categoria', 'categoria.id = categoria_post.categoria_id','left')
			->groupBy('categoria.categoria_nombre')
			->findAll();

		return view('home', $data);
	}
}
