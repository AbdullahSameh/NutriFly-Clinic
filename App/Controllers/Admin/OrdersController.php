<?php 

namespace App\Controllers\Admin;

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
		$this->html->setTitle('Orders');
		$data['orders'] = $this->load->model('Orders')->all();
		$data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
		$view = $this->view->render('admin/orders/list', $data);
		return $this->adminLayout->render($view);
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
		$view = $this->view->render('admin/orders/order', $data);
		return $this->adminLayout->render($view);
	}

	/**
     * Make order as paid
     *
     * @param int $id
     * @return void
     */
	public function paid($id)
	{
		$this->load->model('Orders')->paid($id);
		return $this->url->redirectTo('/admin/orders');
	}

	/**
     * delete order 
     *
     * @param int $id
     * @return void
     */
	public function delete($id)
	{
		$this->load->model('Orders')->delete($id);
		$this->session->set('success', 'Order Has Been Deleted Successfully');
		return $this->url->redirectTo('/admin/orders');
	}
}