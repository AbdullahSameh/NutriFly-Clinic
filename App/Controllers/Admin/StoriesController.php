<?php 

namespace App\Controllers\Admin;

use System\Controller;

class StoriesController extends Controller
{
	/**
	 * Dispaly Stories list
	 * 
	 * @return mixed
	 */
	public function index()
	{
		$this->html->setTitle('Stories');
		$data['stories'] = $this->load->model('Stories')->all();
		$view = $this->view->render('admin/stories/list', $data);
		return $this->adminLayout->render($view);
	}

	/**
	 * Open stories form
	 * 
	 * @return string
	 */
	public function add()
	{
		return $this->form();
	}

	/**
	 * Submit to create new story
	 * 
	 * @return string || json
	 */
	public function submit()
	{
		$json = [];
		if ($this->isValid()) {
			// it means there are no errors in form validation
			$this->load->model('Stories')->create();
			$json['success'] = 'Story Has Been Created Successfully';
			$json['redirectTo'] = $this->url->link('/admin/stories');
		} else {
			// it means there are errors in form validation
			$json['errors'] = $this->validator->splitMessage();
		}
		return $this->json($json);
	}

	/**
	 * Edit stories form
	 * 
	 * @param int $id
	 * @return string
	 */
	public function edit($id)
	{
		$storiesModel =  $this->load->model('Stories');

		if (! $storiesModel->tableValExists($id)) {
			return $this->url->redirectTo('/404');
		}
		$story = $storiesModel->get($id);
		
		return $this->form($story);
	}

	/**
	 * Edit stories edit
	 * 
	 * @return string
	 */
	public function save($id)
	{
		$json = [];
		if ($this->isValid()) {
			// it means there are no errors in form validation
			$this->load->model('Stories')->update($id);
			$json['success'] = 'Story Has Been Updated Successfully';
			$json['redirectTo'] = $this->url->link('/admin/stories');
		} else {
			// it means there are errors in form validation
			$json['errors'] = $this->validator->splitMessage();
		}
		return $this->json($json);
	}

	/**
	 * Delete story record
	 * 
	 * @param int $id
	 * @return mixed
	 */
	public function delete($id)
	{
		$storiesModel =  $this->load->model('Stories');

		if (! $storiesModel->tableValExists($id)) {
			return $this->url->redirectTo('/404');
		}
		$storiesModel->delete($id);
		$json['success'] = 'Story Has Been Deleted Successfully';
		return $this->json($json);
	}

	/**
	 * Display story form
	 * 
	 * @param \stdClass $story
	 */
	private function form($story = null)
	{
		if ($story) {
			// Handle editing story form
			$data['target'] = 'edit-story-' . $story->id;
			$data['action'] = $this->url->link('/admin/stories/save/' . $story->id);
			$data['heading'] = 'Edit ' . $story->story_title;
		} else {
			// Handle adding story form
			$data['target'] = 'add-story-form';
			$data['action'] = $this->url->link('/admin/stories/submit');
			$data['heading'] = 'Add New Story';
		}
		$story = (array) $story;
		$data['story_title'] = array_get($story, 'story_title');
		$data['story_name'] = array_get($story, 'story_name');
		$data['details'] = array_get($story, 'details');
		$data['image'] = '';
		if (! empty($story['image'])) {
			$data['image'] = $this->url->link('/public/upload/stories/' . $story['image']);
		} 
		$data['status'] = array_get($story, 'status', 'enabled');
		$data['created_at'] = array_get($story, 'created_at');
		return $this->view->render('admin/stories/form', $data);
	}

	/**
	 * Validate the form
	 * 
	 * @return bool
	 */
	public function isValid()
	{
		$this->validator->required('story_title', 'Story Title is Required');
		$this->validator->required('story_name', 'Story Name is Required');
		$this->validator->required('details', 'Story Details is Required');
		return $this->validator->passes();
	}
}