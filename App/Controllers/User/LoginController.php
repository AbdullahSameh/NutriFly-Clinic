<?php 

namespace App\Controllers\User;

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
		if ($loginModel->isLogged()) {
			return $this->url->redirectTo('/');
		}
		$data['success'] = $this->session->has('success') ? $this->session->pull('success') : 0;
		$data['errors'] = $this->errors;
		return $this->view->render('user/login/login', $data);
	}

	/**
	 * Submit login form
	 *
	 * @return mixed
	 */
	public function submit()
	{
		if ($this->isValid()) {
			$loginModel = $this->load->model('Login');
			$userData = $loginModel->user();
			$this->session->set('login', $userData->code);
			return $this->url->redirectTo('/');
		} else {
			// pre($this->errors);
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
		$token = $this->request->post('token');

		if ($token) {
			$csrf = $this->csrf->check($token);
			/* var_dump($csrf);
			if (! $csrf) {
				$this->errors[] = lang('csrf_token');
			} */
		} else {
			$this->errors[] = lang('csrf_token');
		}
		if (! $email) {
			$this->errors[] = lang('login_email');
		} elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->errors[] = lang('valid_email');
		}

		if (! $password) {
			$this->errors[] = lang('login_pass');
		}

		if (! $this->errors) {
			$loginModel = $this->load->model('Login');
			if (! $loginModel->isValidLogin($email, $password)) {
				$this->errors[] = lang('login_data');
			}
		}
		return empty($this->errors);
	}

	/**
	 * Display register form
	 *
	 * @return mixed
	 */
	public function register()
	{
		if ($this->isValidRegister()) {	
			$this->request->setPost('users_group_id', 2);

			$this->load->model('Users')->create();

			$this->session->set('success', 'User Has Been Created Successfully');
			return $this->url->redirectTo('/login');
		} else {
			$this->errors = $this->validator->getMessage();
			return $this->index();
		}		
	}
	
	/**
	 * Validate register form
	 * 
	 * @return bool
	 */
	private function isValidRegister()
	{
		$this->validator->checkToken('token');
		$this->validator->required('first_name', lang('first_name'))
                        ->required('last_name', lang('last_name'));
		$this->validator->required('email')->email('email')->unique('email', ['users', 'email']);
		$this->validator->required('password')
						->minLen('password', 6)
						->maxLen('password', 20);
        return $this->validator->passes();
	}
}