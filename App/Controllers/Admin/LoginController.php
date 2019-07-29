<?php 

namespace App\Controllers\Admin;

use System\Controller;

class LoginController extends Controller
{
	/**
	 * Display login form
	 *
	 * @return mixed
	 */
	public function index()
	{
		$loginModel = $this->load->model('Login');
		if ($loginModel->isLogged()){
			return $this->url->redirectTo('/admin');
		}
		$data['errors'] = $this->errors;
		return $this->view->render('admin/users/login', $data);
	}

	/**
	 * Submit login form
	 *
	 * @return mixed
	 */
	public function submit()
	{
		if ($this->isValid()){
			$loginModel = $this->load->model('Login');
			$loggedInUser = $loginModel->user();
			$this->session->set('login', $loggedInUser->code);
			return $this->url->redirectTo('/admin');
		} else {
			return $this->index();
		}
	}

	/**
	 * Validate login form
	 * 
	 * @return bool
	 */
	private function isValid()
	{
		$email = filter_var($this->request->post('email'), FILTER_SANITIZE_EMAIL);
		$password = $this->request->post('password');

		if (! $email) {
			$this->errors[] = 'Please insert email address';
		} elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->errors[] = 'Please insert valid  email';
		}

		if (! $password) {
			$this->errors[] = 'Please insert your password';
		}

		if (! $this->errors) {
			$loginModel = $this->load->model('Login');
			if (! $loginModel->isValidLogin($email, $password)) {
				$this->errors[] = 'Invalid login data';
			}
		}
		return empty($this->errors);
	}
}