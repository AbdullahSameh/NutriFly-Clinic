<?php

namespace App\Models;

use System\Model;

class NutrtionPlanModel extends Model
{
    /**
     * Users table
     *
     * @var string
     */
    protected $table = 'nutrtion_plan';

    /**
     * Create new nutrtion plan
     *
     * @return void
     */
    public function create()
    {
        $this->data([
            'first_name' => $this->request->post('first_name'),
            'last_name' => $this->request->post('last_name'),
            'email' => $this->request->post('email'),
            'gender' => $this->request->post('gender'),
            'age' => $this->request->post('age'),
            'height' => $this->request->post('height'),
            'carrent_weight' => $this->request->post('carrent_weight'),
            'desired_weight' => $this->request->post('desired_weight'),
            'health_status' => $this->request->post('health_status'),
            'mobile' => $this->request->post('mobile'),
            'mobile2' => $this->request->post('mobile2'),
            'created_at' => date('Y-m-d H:i:s'),
        ])->insert($this->table);
    }
}