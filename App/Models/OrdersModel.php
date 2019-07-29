<?php

namespace App\Models;

use System\Model;

class OrdersModel extends Model
{
    /**
     * Orders table
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * Get all prders
     *
     * @return mixed
     */
    public function all()
    {
        return $this->select('o.*', 'u.first_name', 'u.last_name', 'a.city', 'a.area')
                    ->select('(SELECT COUNT(op.product_id) FROM orders_products op WHERE op.order_id = o.id) AS total_item')
                    ->from('orders o')
                    ->join('LEFT JOIN users u ON o.user_id = u.id')
                    ->join('LEFT JOIN addresses a ON o.address_id = a.id')
                    ->fetchAll();
    }

    /**
     * Get order with all products of this order and address 
     * 
     * @param int $id
     * @return array
     */
    public function getOrderWithProducts($id)
    {
        $order = $this->where('id = ?', $id)->fetch($this->table);

        if (! $order) return [];

        $order->user = $this->select('first_name', 'last_name')
                            ->where('id = ?', $order->user_id)
                            ->fetch('users');

        $order->products = $this->select('op.*', 'p.name', 'p.price')->from('orders_products op')
                                ->join('LEFT JOIN products p ON op.product_id = p.id')
                                ->where('order_id = ?', $order->id)
                                ->fetchAll();

        $order->address = $this->select('*')/*->from('addresses')*/
                                 ->where('id = ?', $order->address_id)
                                 ->fetch('addresses');

        return $order;
    }

    /**
     * Create new order
     *
     * @param int $userId
     * @param int $addressId
     * @param int $total
     * @return void
     */
    public function createOrder($userId, $addressId, $total)
    {
        $orderId = $this->data([
            'user_id' => $userId,
            'address_id' => $addressId,
            'total' => $total,
            'created_at' => date('Y-m-d H:i:s'),
        ])->insert($this->table)->lastId();

        return $orderId;
    }

    /**
     * Create order products
     *
     * @param int $orderId
     * @param array $addToCart
     * @return void
     */
    public function orderProducts($orderId, $addToCart)
    {
        foreach ($addToCart as $shopCart) {
            $productId = $shopCart['cart_id'];
            $quantity = $shopCart['cart_quantity'];
            
            $this->data([
                'order_id' => $orderId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ])->insert('orders_products');
        }
    }

    /**
     * Make order paid as true
     *
     * @param int $id
     * @return void
     */
    public function paid($id)
    {
        $this->data('paid', 1)->where('id = ?', $id)->update($this->table);
    }

    /**
     * Make order as cancel
     *
     * @param int $id
     * @return void
     */
    public function cancel($id)
    {
        $this->data('cancel', 1)->where('id = ?', $id)->update($this->table);
    }

    /**
     * delete order 
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $order = $this->get($id);

        // delete order address
        $this->where('id = ?', $order->address_id)->delete('addresses');

        // delete orders products
        $this->where('order_id = ?', $order->id)->delete('orders_products');

        // delete order 
        $this->where('id = ?', $id)->delete($this->table);
    }
}
