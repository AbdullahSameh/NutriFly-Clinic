<?php 

namespace App\Controllers\Admin;

use System\Controller;

class UsersGroupsController extends Controller
{
	/**
	 * Dispaly users groups list
	 * 
	 * @return mixed
	 */
	public function index()
	{
		$this->html->setTitle('Users Groups');
		$data['usersGroups'] = $this->load->model('UsersGroups')->all();
		$view = $this->view->render('admin/users-groups/list', $data);
		return $this->adminLayout->render($view);
	}

	/**
	 * Open add users groups form
	 * 
	 * @return string
	 */
	public function add()
	{
		return $this->form();
	}

	/**
	 * Submit to create new user group
	 * 
	 * @return string
	 */
	public function submit()
	{
		$json = [];
		if ($this->isValid()) {
			// it means there are no errors in form validation
			$this->load->model('UsersGroups')->create();
			$json['success'] = 'Users Groups Has Been Created Successfully';
			$json['redirectTo'] = $this->url->link('/admin/users-groups');
		} else {
			// it means there are errors in form validation
			$json['errors'] = $this->validator->splitMessage();
		}
		return $this->json($json);
	}

	/**
	 * Open edit users groups form
	 * 
	 * @param int $id
	 * @return string
	 */
	public function edit($id)
	{
		$usersGroupsModel = $this->load->model('UsersGroups');
		if (! $usersGroupsModel->tableValExists($id)) {
			return $this->url->redirectTo('/404');
		}
		$userGroup = $usersGroupsModel->get($id);
		return $this->form($userGroup);
	}

	/**
	 * Submit to create new user group
	 * 
	 * @param int $id
	 * @return string
	 */
	public function save($id)
	{
		$json = [];
		if ($this->isValid()) {
			// it means there are no errors in form validation
			$this->load->model('UsersGroups')->update($id);
			$json['success'] = 'Users Groups Has Been Updated Successfully';
			$json['redirectTo'] = $this->url->link('/admin/users-groups');
		} else {
			// it means there are errors in form validation
			$json['errors'] = $this->validator->splitMessage();
		}
		return $this->json($json);
	}

	/**
	 * Delete users groups from table
	 * 
	 * @param int $id
	 * @return mixed
	 */
	public function delete($id)
	{
		$usersGroupsModel = $this->load->model('UsersGroups');
		if (! $usersGroupsModel->tableValExists($id) || $id == 1) {
			return $this->url->redirectTo('/404');
		}
		$usersGroupsModel->delete($id);
		$json['success'] = 'Users Groups Has Been Deleted Successfully';
		return $this->json($json);
	}

	/**
	 * Display users groups form
	 * 
	 * @param \stdClass $usersGroups
	 */
	private function form($userGroup = null)
	{
		if ($userGroup) {
			// Handle editing users groups form
			$data['target'] = 'edit-usersGroups-' . $userGroup->id;
			$data['action'] = $this->url->link('/admin/users-groups/save/' . $userGroup->id);
			$data['heading'] = 'Update Users Groups';
		} else {
			// Handle adding users groups form
			$data['target'] = 'add-usersGroups-form';
			$data['action'] = $this->url->link('/admin/users-groups/submit');
			$data['heading'] = 'Add New User Group';
		}
		$data['name'] = $userGroup ? $userGroup->name : null;
		$data['users_groups_pages'] = $userGroup ? $userGroup->pages : [];
		$data['pages'] = $this->getAllPermissionPages();
		return $this->view->render('admin/users-groups/form', $data);;
	}

	/**
	 * Validate the form
	 * 
	 * @return bool
	 */
	private function isValid()
	{
		$this->validator->required('name', 'Users Groups Name is Required');
		return $this->validator->passes();
	}

	/**
	 * Get all permission pages
	 * 
	 * @return array
	 */
	private function getAllPermissionPages()
	{
		$permission = [];
		$routes = $this->route->routes();
		foreach ($routes as $route) {
			if (strpos($route['url'], '/admin') === 0) {
				$permission[] = $route['url'];
			}
		}
		return $permission;
	}
}