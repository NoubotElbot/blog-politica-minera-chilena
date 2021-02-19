<?php

namespace App\Controllers;
use App\Models\PostModel;
class Home extends BaseController
{
	public function index()
	{
		$postModel = new PostModel;
		$data['posts'] = $postModel->findAll();
		return view('home', $data);
	}
}
