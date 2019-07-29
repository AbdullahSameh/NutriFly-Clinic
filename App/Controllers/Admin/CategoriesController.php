<?php 

namespace App\Controllers\Admin;

use System\Controller;

class CategoriesController extends Controller
{
	/**
	 * Dispaly categories list
	 * 
	 * @return mixed
	 */
	public function index()
	{
		$this->html->setTitle('Categories');
		$data['categories'] = $this->load->model('Categories')->all();
		$view = $this->view->render('admin/categories/list', $data);
		return $this->adminLayout->render($view);
	}

	/**
	 * Open categories form
	 * 
	 * @return string
	 */
	public function add()
	{
		return $this->form();
	}

	/**
	 * Submit to create new category
	 * 
	 * @return string || json
	 */
	public function submit()
	{
		$json = [];
		if ($this->isValid()) {
			// it means there are no errors in form validation
			$this->load->model('Categories')->create();
			$json['success'] = 'Category Has Been Created Successfully';
			$json['redirectTo'] = $this->url->link('/admin/categories');
		} else {
			// it means there are errors in form validation
			$json['errors'] = $this->validator->splitMessage();
		}
		return $this->json($json);
	}

	/**
	 * Edit category form
	 * 
	 * @param int $id
	 * @return string
	 */
	public function edit($id)
	{
		$categoriesModel =  $this->load->model('Categories');

		if (! $categoriesModel->tableValExists($id)) {
			return $this->url->redirectTo('/404');
		}
		$category = $categoriesModel->get($id);
		
		return $this->form($category);
	}

	/**
	 * Edit category edit
	 * 
	 * @return string
	 */
	public function save($id)
	{
		$json = [];
		if ($this->isValid()) {
			// it means there are no errors in form validation
			$this->load->model('Categories')->update($id);
			$json['success'] = 'Category Has Been Updated Successfully';
			$json['redirectTo'] = $this->url->link('/admin/categories');
		} else {
			// it means there are errors in form validation
			$json['errors'] = $this->validator->splitMessage();
		}
		return $this->json($json);
	}

	/**
	 * Delete category record
	 * 
	 * @param int $id
	 * @return mixed
	 */
	public function delete($id)
	{
		$categoriesModel =  $this->load->model('Categories');

		if (! $categoriesModel->tableValExists($id)) {
			return $this->url->redirectTo('/404');
		}
		$categoriesModel->delete($id);
		$json['success'] = 'Category Has Been Deleted Successfully';
		return $this->json($json);
	}

	/**
	 * Display category form
	 * 
	 * @param \stdClass $category
	 */
	private function form($category = null)
	{
		if ($category) {
			// Handle editing category form
			$data['target'] = 'edit-category-' . $category->id;
			$data['action'] = $this->url->link('/admin/categories/save/' . $category->id);
			$data['heading'] = 'Edit ' . $category->name;
		} else {
			// Handle adding category form
			$data['target'] = 'add-category-form';
			$data['action'] = $this->url->link('/admin/categories/submit');
			$data['heading'] = 'Add New Category';
		}
		$data['name'] = $category ? $category->name : null;
		$data['name_ar'] = $category ? $category->name_ar : null;
		$data['status'] = $category ? $category->status : null;
		$data['image'] = '';
        if (! empty($category->image)) {
            $data['image'] = $this->url->link('/public/upload/categories/' . $category->image);
        }
		return $this->view->render('admin/categories/form', $data);
	}

	/**
	 * Validate the form
	 * 
	 * @return bool
	 */
	public function isValid()
	{
		$this->validator->required('name', 'English Name For Category is Required');
		$this->validator->required('name', 'Arabic Name For Category is Required');
		return $this->validator->passes();
	}
}