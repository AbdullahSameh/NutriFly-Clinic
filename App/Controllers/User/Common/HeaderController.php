<?php

namespace App\Controllers\User\Common;

use System\Controller;

class HeaderController extends Controller
{
	public function index()
	{
		$data['title'] = $this->html->getTitle();
		$loginModel = $this->load->model('Login');
		$data['addToCart'] = $this->session->has('addToCart') ? $this->session->get('addToCart') : null;
		$data['user'] = $loginModel->isLogged() ? $loginModel->user() : null;
		$data['settings'] = $this->load->model('Settings')->allSettings();
		return $this->view->render('user/common/header', $data);
	}
}