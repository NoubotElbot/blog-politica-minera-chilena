<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
class Login extends BaseController
{
	public function index()
	{
		return view('login');
	}
}
