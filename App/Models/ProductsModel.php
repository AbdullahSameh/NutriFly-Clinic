<?php

namespace App\Models;

use System\Model;

class ProductsModel extends Model
{
    /**
     * Products table
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Get all products
     *
     * @return mixed
     */
    public function all()
    {
        return $this->select('p.*', 'pc.name AS category')->from('products p')
                    ->join('LEFT JOIN categories pc ON p.category_id = pc.id')
                    ->fetchAll();
    }

    /**
     * Get latest products
     *
     * @return mixed
     */
    public function latest()
    {
        return $this->select('*')->from($this->table)->orderBy('id', 'DESC')->limit(4)->fetchAll();
    }

    /**
     * Create product
     *
     * @return void
     */
    public function create()
    {
        $image = $this->uploadImage();
        if ($image) {
            $this->data('image', $image);
        }
        $this->data([
            'name' => $this->request->post('name'),
            'category_id' => $this->request->post('category'),
            'description' => $this->request->post('description'),
            'price' => $this->request->post('price'),
            'weight' => $this->request->post('weight'),
            'feature' => $this->request->post('feature'),
            'warning' => $this->request->post('warning'),
            'how_to_use' => $this->request->post('how_to_use'),
            'ingredient' => $this->request->post('ingredient'),
            'stock' => $this->request->post('stock'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ])->insert($this->table);
    }

    /**
     * Update product
     *
     * @return void
     */
    public function update($id)
    {
        $image = $this->uploadImage();
        if ($image) {
            $this->data('image', $image);
        }
        $this->data([
            'name' => $this->request->post('name'),
            'category_id' => $this->request->post('category'),
            'description' => $this->request->post('description'),
            'price' => $this->request->post('price'),
            'weight' => $this->request->post('weight'),
            'feature' => ltrim($this->request->post('feature')),
            'warning' => ltrim($this->request->post('warning')),
            'how_to_use' => ltrim($this->request->post('how_to_use')),
            'ingredient' => $this->request->post('ingredient'),
            'stock' => $this->request->post('stock'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ])->where('id = ?', $id)->update($this->table);
    }

    /**
     * Upload user image
     * 
     * @return string
     */
    private function uploadImage()
    {
        $image = $this->request->UploadFile('image');
        if (! $image->isUploaded()) {return '';}
        if ($image->isImage()) {
            return $image->moveTo($this->app->file->toPuplic('upload/products/'));
		}
    }
}
