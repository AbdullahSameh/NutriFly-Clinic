<?php 

namespace App\Controllers\User;

use System\Controller;

class OrdersController extends Controller
{
	/**
     * Dispaly orders list
     *
     * @return mixed
     */
	public function index()
	{
		$this->html->setTitle('My Orders');
		$data['orders'] = $this->load->model('Orders')->all();
		$data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
		$view = $this->view->render('user/orders/list', $data);
		return $this->userLayout->render($view);
	}

	/**
     * Dispaly orders list
     *
     * @param int $id
     * @return mixed
     */
	public function show($id)
	{
		$this->html->setTitle('Order Details');
		$data['order'] = $this->load->model('Orders')->getOrderWithProducts($id);
		$view = $this->view->render('user/orders/order', $data);
		return $this->userLayout->render($view);
	}

	/**
     * Cancel order 
     *
     * @param int $id
     * @return void
     */
	public function cancel($id)
	{
		$this->load->model('Orders')->cancel($id);
		return $this->url->redirectTo('/orders');
	}
}