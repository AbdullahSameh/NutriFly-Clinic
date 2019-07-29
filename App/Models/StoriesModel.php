<?php 

namespace App\Models;

use System\Model;

class StoriesModel extends Model
{
	/**
	 * Users table
	 *
	 * @var string
	 */
	protected $table = 'stories';

	/**
	 * Create new story record
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
			'story_title' => $this->request->post('story_title'),
			'story_name' => $this->request->post('story_name'),
			'details' => $this->request->post('details'),
			'status' => $this->request->post('status'),
			'created_at' => date('Y-m-d H:i:s'),
		])->insert($this->table);
	}

	/**
	 * Update story record
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
			'story_title' => $this->request->post('story_title'),
			'story_name' => $this->request->post('story_name'),
			'details' => $this->request->post('details'),
			'status' => $this->request->post('status'),
			'created_at' => date('Y-m-d H:i:s'),
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
			return $image->moveTo($this->app->file->toPuplic('upload/stories/'));
		}
    }
}