<?php

namespace App\Controllers\User\Common;

use System\Controller;

class FooterController extends Controller
{
	public function index()
	{
		$data['settings'] = $this->load->model('Settings')->allSettings();
		return $this->view->render('user/common/footer', $data);
	}
}