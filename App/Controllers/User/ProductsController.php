<?php 

namespace App\Controllers\User;

use System\Controller;

class ProductsController extends Controller
{
	/**
     * Dispaly all products
     *
     * @return mixed
     */
	public function index()
	{
		$this->html->setTitle('Products');
		
		$data['categories'] = $this->load->model('Categories')->all();
		$data['products'] = $this->load->model('Products')->all();
		
		$view = $this->view->render('user/products/all-products', $data);
		return $this->userLayout->render($view);
	}

	/**
     * Dispaly product details
     *
     * @return mixed
     */
    public function product($id)
    {
		$data['product'] = $this->load->model('Products')->get($id);
		
    	$this->html->setTitle($data['product']->name);
		
		$view = $this->view->render('user/products/product', $data);
		return $this->userLayout->render($view);
    }

    /**
     * Add product to shopping cart
     * 
     * @param int $id
     * @return void
     */
    public function addToCart($id)
    {
    	$productsModel = $this->load->model('Products');

    	if (! $productsModel->tableValExists($id)) {
    		return $this->url->redirectTo('/404');
    	}

    	$addToCart = $this->request->post('addToCart');

    	if ($addToCart) {
    		if ($this->session->has('addToCart')) {

    			$count = count($this->session->get('addToCart'));

				$item_ids = array_column($this->session->get('addToCart'), 'cart_id');

				if (! in_array($this->request->post('item_id'), $item_ids)) {
					$cart_array = array(
						'cart_id' 		=> $this->request->post('item_id'),
						'cart_name' 	=> $this->request->post('name'),
						'cart_price' 	=> $this->request->post('price'),
						'cart_descripe' => $this->request->post('descripe'),
						'cart_quantity' => $this->request->post('quantity'),
						'cart_image' => $this->request->post('image'),
					);
					$this->session->setArray('addToCart', $count, $cart_array);
				}
    		} else {
    			$cart_array = array(
					'cart_id' 		=> $this->request->post('item_id'),
					'cart_name' 	=> $this->request->post('name'),
					'cart_price' 	=> $this->request->post('price'),
					'cart_descripe' => $this->request->post('descripe'),
					'cart_quantity' => $this->request->post('quantity'),
					'cart_image' => $this->request->post('image'),
				);
				$this->session->setArray('addToCart', 0, $cart_array);
    		}
    	}
    	return $this->url->redirectTo('/shopping-cart');
    }
}