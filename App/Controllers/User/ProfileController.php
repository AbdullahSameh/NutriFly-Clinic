<?php 

namespace App\Controllers\User;

use System\Controller;

class ProfileController extends Controller
{
	/**
     * Dispaly profile page
     *
     * @return mixed
     */
	public function index()
	{
		$this->html->setTitle('Profile');
		$loginModel = $this->load->model('Login');
		if ($loginModel->isLogged()) {
			$data['user'] = $loginModel->isLogged() ? $loginModel->user() : null;
			$data['errors'] = $this->session->has('errors') ? $this->session->pull('errors') : null;
			$view = $this->view->render('user/profile/profile', $data);
			return $this->userLayout->render($view);
		} else {
			return $this->url->redirectTo('/404');
		}
	}

	/**
     * Update user profile
     * 
     * @param int $id
     * @return void
     */
	public function update($id)
	{
		$loginModel = $this->load->model('Login');
		if ($loginModel->isLogged()) {

			if ($this->isValid()) {
				$this->load->model('Users')->update($id);
			} else {
				$this->session->set('errors', $this->validator->getMessage());
			}
			return $this->url->redirectTo('/profile');
		} else {
			return $this->url->redirectTo('/404');
		}
	}

	/**
     * Validate the form
     *
     * @return bool
     */
    private function isValid()
    {
        $this->validator->required('first_name', lang('first_name'))
                        ->required('last_name', lang('last_name'))
                        ->required('birthday', lang('birthday_error'));
        $password = $this->request->post('password');
        if ($password) {
			$this->validator->minLen('password', 6, lang('password_minLen'))
							->maxLen('password', 20, lang('password_maxLen'))
							->match('password', 'confirm_password', lang('password_match'));
        }
        return $this->validator->passes();
    }
}