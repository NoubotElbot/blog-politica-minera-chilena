<?php

namespace App\Controllers;

use App\Models\CategoriaModel;

class Categoria extends BaseController
{
	public function index()
	{
        $model = new CategoriaModel;
        $data['categorias'] = $model->findAll();
		return view('Dashboard/Categoria/index', $data);
	}
}