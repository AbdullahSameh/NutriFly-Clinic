<?php 

namespace App\Models;

use System\Model;

class CategoriesModel extends Model
{
	/**
	 * Users table
	 *
	 * @var string
	 */
	protected $table = 'categories';

	/**
	 * Get record limit 5
	 *
	 * @return array
	 */
	public function allWithLimit()
	{
		return $this->select('*')->from($this->table)->limit(5)->fetchAll();
	}

	/**
	 * Create new category record
	 *
	 * @var void
	 */
	public function create()
	{
		$image = $this->uploadImage();
        if ($image) {
            $this->data('image', $image);
        }
		$this->data([
			'name' => $this->request->post('name'),
			'name_ar' => $this->request->post('name_ar'),
			'status' => $this->request->post('status'),
		])->insert($this->table);
	}

	/**
	 * Update category record
	 *
	 * @var void
	 */
	public function update($id)
	{
		$image = $this->uploadImage();
        if ($image) {
            $this->data('image', $image);
        }
		$this->data([
			'name' => $this->request->post('name'),
			'name_ar' => $this->request->post('name_ar'),
			'status' => $this->request->post('status'),
		])
		->where('id = ?', $id)
		->update($this->table);
	}

	/**
	 * Get category with all products of this category
	 * 
	 * @param int $id
	 * @return array
	 */
	public function getCategoryWithProducts($id)
	{
		$category = $this->where('id = ?', $id)->fetch($this->table);

		if (! $category) return [];

		$category->products = $this->select('p.*')
								   ->from('products p')
								   ->where('p.category_id = ?', $category->id)
								   ->fetchAll();
	    return $category;
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
			return $image->moveTo($this->app->file->toPuplic('upload/categories/'));
		}
    }
}