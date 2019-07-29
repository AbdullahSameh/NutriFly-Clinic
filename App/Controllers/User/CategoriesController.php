<?php 

namespace App\Controllers\User;

use System\Controller;

class CategoriesController extends Controller
{
	public function index($title, $id)
	{
		//pre($_SESSION);

		$category = $this->load->model('Categories')->getCategoryWithProducts($id);
		
		if (! $category) {
			return $this->url->redirectTo('/404');
		}
		$this->html->setTitle($category->name . ' Products');
		
		$data['cat'] = $category;
		$data['categories'] = $this->load->model('Categories')->all();

		$view = $this->view->render('user/products/category-products', $data);
		return $this->userLayout->render($view);
	}
}