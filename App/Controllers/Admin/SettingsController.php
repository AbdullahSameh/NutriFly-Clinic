<?php

namespace App\Controllers\Admin;

use System\Controller;

class SettingsController extends Controller
{
	/**
	 * Dispaly settings form
	 * 
	 * @return mixed
	 */
	public function index()
	{
		$this->html->setTitle('Settings');
		$data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
		$data['errors'] = $this->session->has('errors') ? $this->session->pull('errors') : null;
		$data['settings'] = $this->load->model('Settings')->allSettings();

		$view = $this->view->render('admin/settings/list', $data);
		return $this->adminLayout->render($view);
	}

	/**
	 * Save settings edit
	 * 
	 * @return string
	 */
	public function save()
	{
		//pre($_POST);
		if ($this->isValid()) {
			$this->load->model('Settings')->save();
			$this->session->set('success', 'Settings Has Been Saved Successfully');
		} else {
			$this->session->set('errors', $this->validator->getMessage());
		}
		return $this->url->redirectTo('/admin/settings');
	}

	/**
	 * Validate the form
	 * 
	 * @return bool
	 */
	public function isValid()
	{
		$this->validator->required('site_name', 'Site name is Required')
			->required('site_email', 'Site email is Required')
			->required('site_description', 'Site Description is Required')
			->required('maintenance_message', 'Maintenance message is Required');
		return $this->validator->passes();
	}
}
