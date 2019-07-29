<?php 

namespace App\Controllers\User;

use System\Controller;

class CheckoutController extends Controller
{
	/**
     * Dispaly checkout form
     *
     * @return mixed
     */
	public function index()
	{
		// pre($_SESSION);
		
		$this->html->setTitle('Checkout');
		$userModel = $this->load->model('login');
		if (! $userModel->isLogged()) {
			return $this->url->redirectTo('/login');
		}
        $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
        $data['errors'] = $this->session->has('errors') ? $this->session->pull('errors') : null;
		$data['addToCart'] = $this->session->get('addToCart');
		$view = $this->view->render('user/checkout/checkout', $data);
		return $this->userLayout->render($view);
	}

	/**
     * Order products
     *
     * @return void
     */
    public function order()
    {
    	$userModel = $this->load->model('login');
		if (! $userModel->isLogged()) {
			return $this->url->redirectTo('/login');
		}
        $user = $userModel->user();

        if ($this->isValid()) {
    		$this->load->model('Addresses')->createAddress($user->id);
    		$orderId = $this->createOrders($user->id);
    		$this->createOrderProducts($orderId);
            $this->session->set('success', 'Products Has Been orderd Successfully');
        } else {
            $this->session->set('errors', $this->validator->getMessage());
        }
        return $this->url->redirectTo('/checkout');
    }

    /**
     * Create new order
     *
     * @param int $userId
     * @return int
     */
    private function createOrders($userId)
    {
    	$address = $this->load->model('Addresses')->get($userId);

    	$subTotal= 0;
    	$addToCart = $this->session->has('addToCart') ? $this->session->get('addToCart') : null;

    	foreach ($addToCart as $key => $shopCart) {
    		$subTotal = $subTotal + ($shopCart['cart_price'] * $shopCart['cart_quantity']);
			$total = $subTotal;
    	}
    	$orderId = $this->load->model('Orders')->createOrder($userId, $address->id, $total);
    	return $orderId;
    }

    /**
     * Create order products
     *
     * @param int $orderId
     * @return void
     */
    private function createOrderProducts($orderId)
    {
        $addToCart = $this->session->has('addToCart') ? $this->session->get('addToCart') : null;

        $this->load->model('Orders')->orderProducts($orderId, $addToCart);
    }

    /**
     * Validate addresses form
     * 
     * @return bool
     */
    private function isValid()
    {
        $this->validator->required('city', lang('city_error'))
                        ->required('area', lang('area_error'))
                        ->required('street', lang('street_error'))
                        ->required('building', lang('building_error'))
                        ->required('landmark', lang('landmark_error'))
                        ->required('mobile', lang('mobile_error'));

        $this->validator->required('floor', lang('floor_error'))->number('floor', lang('floor_error_number'));
        $this->validator->required('apartment', lang('apartment_error'))->number('apartment', lang('apartment_error_number'));

        return $this->validator->passes();
    }
}