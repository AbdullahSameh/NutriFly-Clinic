<?php 

namespace App\Models;

use System\Model;

class LoginModel extends Model
{
	/**
	 * Users table
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Logged in user
	 *
	 * @var \stdClass
	 */
	private $user;

	/**
	 * Check if the login data is vaild
	 *
	 * @param string $email
	 * @param string $password
	 * @return bool
	 */
	public function isValidLogin($email, $password)
	{
		$user = $this->where('email = ?', $email)->fetch($this->table);
		if (! $user) return false;
		$this->user = $user;
		return password_verify($password, $user->password);
	}

	/**
	 * Get logged in user data
	 *
	 * @return \stdClass
	 */
	public function user()
	{
		return $this->user;
	}

	/**
	 * Ceck if the user logged in
	 *
	 * @return bool
	 */
	public function isLogged()
	{
		if ($this->session->has('login')) {
			$code = $this->session->get('login');
		} elseif ($this->cookie->has('login')) {
			$code = $this->cookie->set('login');
		} else {
			$code = '';
		}
		$user = $this->where('code = ?', $code)->fetch($this->table);

		if(! $user) return false;

		$this->user = $user;

		return true;
	}
}