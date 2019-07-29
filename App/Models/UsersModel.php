<?php

namespace App\Models;

use System\Model;

class UsersModel extends Model
{
    /**
     * Users table
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Get all users
     *
     * @return mixed
     */
    public function all()
    {
        return $this->select('u.*', 'ug.name AS `groups`')->from('users u')
                    ->join('LEFT JOIN users_groups ug ON u.users_group_id = ug.id')
                    ->fetchAll();
    }

    /**
     * Get all users
     *
     * @return void
     */
    public function create()
    {
        $image = $this->uploadImage();
        if ($image) {
            $this->data('image', $image);
        } else {
            $this->data('image', 'user.jpg');
        }
        $this->data([
            'first_name' => $this->request->post('first_name'),
            'last_name' => $this->request->post('last_name'),
            'email' => $this->request->post('email'),
            'password' => password_hash($this->request->post('password'), PASSWORD_DEFAULT),
            'users_group_id' => $this->request->post('users_group_id'),
            'gender' => $this->request->post('gender'),
            'country' => $this->request->post('country'),
            'birthday' => strtotime($this->request->post('birthday')),
            'created_at' => $now = time(),
            'code' => sha1($now . mt_rand()),
            'ip' => $this->request->server('REMOTE_ADDR'),
        ])->insert($this->table);
    }

    /**
     * Update user
     *
     * @return void
     */
    public function update($id)
    {
        $image = $this->uploadImage();
        if ($image) {
            $this->data('image', $image);
        }
        $password = $this->request->post('password');
        $usersGroupId = $this->request->post('users_group_id');
        if ($password) {
            $this->data('password', password_hash($password, PASSWORD_DEFAULT));
        }
        if ($usersGroupId) {
            $this->data('users_group_id', $usersGroupId);
        }
        $this->data([
            'first_name' => $this->request->post('first_name'),
            'last_name' => $this->request->post('last_name'),
            'gender' => $this->request->post('gender'),
            'email' => $this->request->post('email'),
            'country' => $this->request->post('country'),
            'birthday' => strtotime($this->request->post('birthday')),
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
            return $image->moveTo($this->app->file->toPuplic('upload/users/'));
		}
    }
}