<?php 

namespace App\Controllers\User;

use System\Controller;

class CartController extends Controller
{
	/**
     * Dispaly all shopping Cart
     *
     * @return mixed
     */
	public function index()
	{
		$this->html->setTitle('Shopping Cart');
		$data['addToCart'] = $this->session->get('addToCart');
		$view = $this->view->render('user/cart/cart', $data);
		return $this->userLayout->render($view);
	}

	/**
     * Update product quantity in shopping Cart
     * 
     * @param int $id
     * @return void
     */
	public function update($id)
	{
		$productsModel = $this->load->model('Products');

    	if (! $productsModel->tableValExists($id)) {
    		return $this->url->redirectTo('/404');
    	}

		$updateCart = $this->request->post('update');
		if ($updateCart) {

			$item_qty = array_column($this->session->get('addToCart'), 'cart_id');
			$quantity = $this->request->post('qty');
			$itemid = $this->request->post('qtyid');

			if (in_array($itemid, $item_qty)) {

				for ($i = 0; $i < count($item_qty); $i++) {
					if ($item_qty[$i] == $itemid) {
						$_SESSION['addToCart'][$i]['cart_quantity'] = $quantity;
					}
				}
			}
		}
		return $this->url->redirectTo('/shopping-cart');
	}

	/**
     * Delete product from shopping Cart
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
    	$productsModel = $this->load->model('Products');

    	if (! $productsModel->tableValExists($id)) {
    		return $this->url->redirectTo('/404');
    	}

    	$addToCart = $this->session->get('addToCart');

    	foreach ($addToCart as $key => $shopCart) {
			if ($shopCart['cart_id'] == $id) {
				$this->session->removeArrayKey('addToCart', $key);
			}
		}
		//$this->session->set('addToCart') = array_values($addToCart);
		$_SESSION['addToCart'] = array_values($_SESSION['addToCart']);
		return $this->url->redirectTo('/shopping-cart');
    }
}