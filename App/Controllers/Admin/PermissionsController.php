<?php 

namespace App\Controllers\Admin;

use System\Controller;

class PermissionsController extends Controller
{
	/**
	 * Check User Permissions to access admin pages
	 * 
	 * @return void
	 */
	public function index()
	{
		$loginModel = $this->load->model('Login');
		$ignoredPages = ['/admin/login', '/admin/login/submit'];
		$currentRoute = $this->route->getCurrentRouteUrl();
		//pre($_SESSION);

		if (($isNotLogged = ! $loginModel->isLogged()) && ! in_array($currentRoute, $ignoredPages)) {
			return $this->url->redirectTo('/admin/login');
		}
		if ($isNotLogged) {
			return false;
		}
		$user = $loginModel->user();
		$usersGroupsModel = $this->load->model('UsersGroups');
		$userGroup = $usersGroupsModel->get($user->users_group_id);
		//pre($userGroup);
		if (! in_array($currentRoute, $userGroup->pages)) {
			$this->session->destroy();
			return $this->url->redirectTo('/404');
		}
	}
}