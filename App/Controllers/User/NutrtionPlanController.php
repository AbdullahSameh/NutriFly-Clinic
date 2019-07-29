<?php 

namespace App\Controllers\User;

use System\Controller;

class NutrtionPlanController extends Controller
{
	/**
     * Dispaly nutrtion plan page
     *
     * @return mixed
     */
	public function index()
	{
		//pre($_SESSION);
        $this->html->setTitle('Nutrtion Plan');
		$view = $this->view->render('user/nutrtion-plan/plan');
		return $this->userLayout->render($view);
	}

	/**
     * Dispaly nutrtion plan form
     *
     * @return mixed
     */
    public function getPlan()
    {
        $this->html->setTitle('Get Nutrtion Plan');

        $loginModel = $this->load->model('Login');
        if (! $loginModel->isLogged()) {
			return $this->url->redirectTo('/login');
		}
        $data['user'] = $loginModel->isLogged() ? $loginModel->user() : null;
        $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
        $data['errors'] = $this->session->has('errors') ? $this->session->pull('errors') : null;
        $view = $this->view->render('user/nutrtion-plan/get-plan', $data);
		return $this->userLayout->render($view);
    }

    /**
     * Send nutrtion plan data
     *
     * @return mixed
     */
    public function sendPlan()
    {
        $loginModel = $this->load->model('Login');
        if (! $loginModel->isLogged()) {
			return $this->url->redirectTo('/404');
        } 
        if ($this->isValid()) {
            $this->load->model('NutrtionPlan')->create();
            $this->session->set('success', lang('send-nutrtion-success'));
        } else {
            $this->session->set('errors', $this->validator->getMessage());
        }
        return $this->url->redirectTo('/nutrtion-plan/get-plan');
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
                        ->required('age', lang('age_error'))
                        ->required('height', lang('height_error'))
                        ->required('carrent_weight', lang('carrentd_weight_error'))
                        ->required('desired_weight', lang('desired_weight_error'))
                        ->required('mobile', lang('mobile_error'))
                        ->required('health_status', lang('health_status_error'));
        $this->validator->required('email', lang('email_error'))->email('email', lang('valid_email'));
        return $this->validator->passes();
    }
}