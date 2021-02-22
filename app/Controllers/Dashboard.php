<?php

namespace App\Controllers;

use App\Models\PostModel;

class Dashboard extends BaseController
{
	public function index()
	{
		$data['vista'] = 'dashboard';
		return view('Dashboard/index', $data);
	}
}