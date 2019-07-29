<?php

namespace App\Controllers\Admin;

use System\Controller;

class UsersController extends Controller
{
    /**
     * Dispaly users groups list
     *
     * @return mixed
     */
    public function index()
    {
        $this->html->setTitle('Users');
        $data['users'] = $this->load->model('Users')->all();
        $view = $this->view->render('admin/users/list', $data);
        return $this->adminLayout->render($view);
    }

    /**
     * Open add users form
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
        	// Validation pass
        	$usersModel =$this->load->model('Users')->create();
        	$json['success'] = 'User Has Been Created Successfully';
			$json['redirectTo'] = $this->url->link('/admin/users');
        } else {
            $json['errors'] = $this->validator->splitMessage();
        }
        return $this->json($json);
    }

    /**
     * Open edit users form
     *
     * @param int $id
     * @return string
     */
    public function edit($id)
    {
    	$usersModel =$this->load->model('Users');
    	if (! $usersModel->tableValExists($id)) {
    		return $this->url->redirectTo('/404');
    	}
    	$user = $usersModel->get($id);
        return $this->form($user);
    }

    /**
     * Save edit user
     *
     * @param int $id
     * @return string
     */
    public function save($id)
    {
    	$join = [];
    	if ($this->isValid($id)) {
    		$this->load->model('Users')->update($id);
    		$json['success'] = 'User Has Been Updated Successfully';
    		$json['redirectTo'] = $this->url->link('/admin/users');
    	} else {
    		$json['errors'] = $this->validator->splitMessage();
    	}
    	return $this->json($json);
    }

    /**
     * Delete user
     *
     * @param int $id
     * @return string
     */
    public function delete($id)
    {
    	$usersModel = $this->load->model('Users');
    	if (! $usersModel->tableValExists($id)) {
    		return $this->url->redirectTo('/404');
    	}
    	$usersModel->delete($id);
    	$json['success'] = 'User Has Been Deleted Successfully';
    	return $this->json($json);
    }

    /**
     * Display users form
     *
     * @param \stdClass $user
     */
    private function form($user = null)
    {
        if ($user) {
            // Handle editing users form
            $data['target'] = 'edit-users-' . $user->id;
            $data['heading'] = 'Edit ' . $user->first_name . ' ' . $user->last_name;
            $data['action'] = $this->url->link('/admin/users/save/'. $user->id);
        } else { 
            // Handle adding users form
            $data['target'] = 'add-users-form';
            $data['heading'] = 'Add New User';
            $data['action'] = $this->url->link('/admin/users/submit');
        }
        $user = (array) $user;

        $data['first_name'] = array_get($user, 'first_name');
        $data['last_name'] = array_get($user, 'last_name');
        $data['country'] = array_get($user, 'country');
        $data['gender'] = array_get($user, 'gender');
        $data['email'] = array_get($user, 'email');
        $data['users_group_id'] = array_get($user, 'users_group_id');
		$data['birthday'] = ! empty($user['birthday']) ? date('d-m-y', $user['birthday']) : '';
        $data['image'] = '';
        if (! empty($user['image'])) {
            $data['image'] = $this->url->link('/public/upload/users/' . $user['image']);
        }
        $data['usersGroups'] = $this->load->model('UsersGroups')->all();
        return $this->view->render('admin/users/form', $data);
    }
    
    /**
     * Validate the form
     *
     * @return bool
     */
    private function isValid($id = null)
    {
        $this->validator->required('first_name', 'First name is required')
                        ->required('last_name', 'Last name is required')
                        ->required('email')
                        ->required('gender')
                        ->required('birthday');
        $this->validator->unique('email', ['users', 'email', 'id', $id]);
        if (is_null($id)) {
        	$this->validator->required('password')
        					->minLen('password', 6)
        					->maxLen('password', 20)
        					->match('password', 'confirm_password', 'Confirm Password should match Password');
        }
        return $this->validator->passes();
    }
}
