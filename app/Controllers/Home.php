<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return $this->response->redirect(site_url('/patients-list'));
	}

	//--------------------------------------------------------------------

}
