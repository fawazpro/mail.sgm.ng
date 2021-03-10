<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo 1234;
	}
	public function me()
	{
		return view('form');
	}

}
