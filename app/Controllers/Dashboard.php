<?php

namespace App\Controllers;

use App\Models\PostModel;

class Dashboard extends BaseController
{
	public function index()
	{
		return view('Dashboard/index');
	}
}