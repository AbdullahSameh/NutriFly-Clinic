<?php 

namespace App\Controllers\Admin;

use System\Controller;

class DashboardController extends Controller
{
	public function index()
	{
		//pre($_SESSION);
		$this->html->setTitle('Dashboard');
		$view = $this->view->render('admin/dashboard');
		return $this->adminLayout->render($view);
	}

	public function submit()
	{
		$userId = 1;
		$this->validator->required('email')->email('email')->unique('email', ['users', 'email', 'id', $userId]);
		$this->validator->required('password')->maxLen('password', 6);
		$this->validator->match('password', 'confirm_password');
		$image = $this->app->request->UploadFile('image');
	}
}