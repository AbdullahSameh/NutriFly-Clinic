<?php 

namespace App\Controllers\User;

use System\Controller;

class SuccessStoryController extends Controller
{
	/**
	 * Dispaly all stories
	 *
	 * @return mixed
	 */
	public function index()
	{
		//pre($_SESSION);
		$this->html->setTitle('Success Story');
		$data['stories'] = $this->load->model('Stories')->all();
		$data['categories'] = $this->load->model('Categories')->all();
		$view = $this->view->render('user/stories/stories', $data);
		return $this->userLayout->render($view);
    }
}