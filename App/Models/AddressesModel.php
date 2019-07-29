<?php

namespace App\Models;

use System\Model;

class AddressesModel extends Model
{
    /**
     * Products table
     *
     * @var string
     */
    protected $table = 'addresses';

    /**
     * Get record by id
     *
     * @param int $id
     * @return \stdClass || null
     */
    public function get($id)
    {
        return $this->where('user_id = ?', $id)->fetch($this->table);
    }
    
    /**
     * Create new address for the orders
     *
     * @param int $id
     * @return void
     */
    public function createAddress($id)
    {
        $this->data([
            'user_id'   => $id,
            'city'      => $this->request->post('city'),
            'area'      => $this->request->post('area'),
            'street'    => $this->request->post('street'),
            'building'  => $this->request->post('building'),
            'floor'     => $this->request->post('floor'),
            'apartment' => $this->request->post('apartment'),
            'landmark'  => $this->request->post('landmark') ,
            'mobile'    => $this->request->post('mobile'),
            'mobile2'   => $this->request->post('mobile2'),
        ])->insert($this->table);
    }
}
