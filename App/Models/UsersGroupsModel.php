<?php 

namespace App\Models;

use System\Model;

class UsersGroupsModel extends Model
{
	/**
	 * Users groups table
	 *
	 * @var string
	 */
	protected $table = 'users_groups';

	/**
	 * Create new users groups record
	 *
	 * @var void
	 */
	public function create()
	{
		$userGroupId = $this->data('name', $this->request->post('name'))->insert($this->table)->lastId();

		// Remove any empty value in the array
		$pages = array_filter($this->request->post('pages'));

		foreach ($pages as $page) {
			$this->data([
				'user_groups_id' => $userGroupId,
				'page' => $page,
			])->insert('users_permissions');
		}
	}

	/**
	 * Update users groups record by id
	 * 
	 * @param int $id
	 * @return void
	 */
	public function update($id)
	{
		$this->data('name', $this->request->post('name'))
			 ->where('id = ?', $id)
			 ->update($this->table);

		// Delete all permissions for the current users group before adding new ones
		$this->where('user_groups_id = ?', $id)->delete('users_permissions');

		// Remove any empty value in the array
		$pages = array_filter($this->request->post('pages'));

		foreach ($pages as $page) {
			$this->data([
				'user_groups_id' => $id,
				'page' => $page,
			])->insert('users_permissions');
		}
	}

	/**
	 * Get users group
	 * 
	 * @return mixed
	 */
	public function get($id)
	{
		$userGroup = parent::get($id);
		if ($userGroup) {
			$pages = $this->select('page')->where('user_groups_id = ?', $userGroup->id)->fetchAll('users_permissions');
			$userGroup->pages = [];
			if ($pages) {
				foreach ($pages as $page) {
					$userGroup->pages[] = $page->page;
				}
			}
		}
		return $userGroup;
	}
}