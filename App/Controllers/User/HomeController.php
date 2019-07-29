<?php 

namespace App\Controllers\User;

use System\Controller;

class HomeController extends Controller
{
	/**
     * Dispaly home page
     *
     * @return mixed
     */
	public function index()
	{
          //pre($_SESSION);
		$this->html->setTitle('Healthy');
		$data['user'] = $this->load->model('login')->user();
          $data['products'] = $this->load->model('Products')->latest();
          $data['categories'] = $this->load->model('Categories')->allWithLimit();
		$view = $this->view->render('user/home', $data);
		return $this->userLayout->render($view);
     }
     
     /**
     * Change site language by session
     *
     * @return void
     */
     public function lang($lang)
     {
          if (in_array($lang, ['en', 'ar'])) {
               if ($this->session->has('lang')) {
                    $this->session->remove('lang');
               }
               $this->session->set('lang', $lang);
          } else {
               if ($this->session->has('lang')) {
                    $this->session->remove('lang');
               }
               $this->session->set('lang', 'ar');
          }
          return $this->url->back();
     }

	/**
     * Send contact us message to administrator
     *
     * @return void
     */
	public function sendMessage()
	{
          pre($_POST);
	}
     
	/**
     * Validate contact us form
     * 
     * @return bool
     */
     private function isValid()
     {
     //
     return $this->validator->passes();
     }
}