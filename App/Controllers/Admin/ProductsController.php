<?php 

namespace App\Controllers\Admin;

use System\Controller;

class ProductsController extends Controller
{
	/**
	 * Dispaly products list
	 * 
	 * @return mixed
	 */
	public function index()
	{
		$this->html->setTitle('Products');
		$data['products'] = $this->load->model('Products')->all();
		$data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
		$view = $this->view->render('admin/products/list', $data);
		return $this->adminLayout->render($view);
	}

	/**
	 * Open add product form
	 * 
	 * @return string
	 */
	public function add()
	{
		$this->html->setTitle('Add Product');
		$data['action'] = $this->url->link('/admin/products/submit');
		$data['categories'] = $this->load->model('Categories')->all();
		$data['errors'] = $this->session->has('errors') ? $this->session->pull('errors') : null;
		$view = $this->view->render('/admin/products/form', $data);
		return $this->adminLayout->render($view);
	}

	/**
	 * Submit to create new product
	 * 
	 * @return string 
	 */
	public function submit()
	{
		if ($this->isValid()) {
			$this->load->model('Products')->create();
			$this->session->set('success', 'Product Has Been Added Successfully');
			return $this->url->redirectTo('/admin/products');
		} else {
			$this->session->set('errors', $this->validator->getMessage());
			return $this->url->redirectTo('/admin/products/add');
		}
	}

	/**
	 * Open edit product form
	 * 
	 * @param int $id
	 * @return string
	 */
	public function edit($id)
	{
		$productsModel = $this->load->model('Products');

		if (! $productsModel->tableValExists($id)) {
			return $this->url->redirectTo('/404');
		}
		$data['product'] = $productsModel->get($id);
		$data['categories'] = $this->load->model('Categories')->all();
		$this->html->setTitle('Edit ' . $data['product']->name);
		$data['errors'] = $this->session->has('errors') ? $this->session->pull('errors') : null;
		$view = $this->view->render('/admin/products/edit-form', $data);
		return $this->adminLayout->render($view);
	}

	/**
	 * Save product edit
	 * 
	 * @return string
	 */
	public function save($id)
	{
		if ($this->isValid()) {
			$this->load->model('Products')->update($id);
			$this->session->set('success', 'Product Has Been Updated Successfully');
			return $this->url->redirectTo('/admin/products');
		} else {
			$this->session->set('errors', $this->validator->getMessage());
			return $this->url->redirectTo('/admin/products/edit' . $id);
		}
	}

	/**
	 * Delete product record
	 * 
	 * @param int $id
	 * @return mixed
	 */
	public function delete($id)
	{
		$productsModel = $this->load->model('Products');

		if (! $productsModel->tableValExists($id)) {
			return $this->url->redirectTo('/404');
		}
		$productsModel->delete($id);
		$this->session->set('success', 'Product Has Been Deleted Successfully');
		return $this->url->redirectTo('/admin/products');
	}

	/**
	 * Validate the form
	 * 
	 * @return bool
	 */
	public function isValid()
	{
		$this->validator->required('name')
						->required('description')
						->required('feature')
						->required('warning')
						->required('how_to_use', 'Product Use is Required')
						->required('ingredient')
						->required('image');

		$this->validator->required('price')->number('price');
		$this->validator->required('weight')->number('weight');
		
		return $this->validator->passes();
	}
}