<?php 

namespace System;


class Session
{
	/**
	 * Application Object
	 * 
	 * @var \System\Application
	 */
	private $app;

	/**
	 * Constructor
	 * 
	 * @param \System\Application $app
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	/**
	 * Strat the session
	 *
	 * @return void
	 */
	public function start()
	{
		ini_set('session.use_only_cookies', 1);
		if (! session_id()) {
			session_start();
		}
	}

	/**
	 * Set new session
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	/**
	 * Set array in session 
	 * (this is for array_column to add product to shopping cart)
	 *
	 * @param string $key
	 * @param int $index_key
	 * @param array $array
	 * @return void
	 */
	public function setArray($key, $index_key, $array)
	{
		$_SESSION[$key][$index_key] = $array;
	}

	/**
	 * Get value from session by key
	 *
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public function get($key, $default = null)
	{
		return array_get($_SESSION, $key, $default);
	}

	/**
	 * Check if the session has the key
	 *
	 * @param string $key
	 * @return bool
	 */
	public function has($key)
	{
		return isset($_SESSION[$key]);
	}

	/**
	 * Remove the key from session
	 *
	 * @param string $key
	 * @return void
	 */
	public function remove($key)
	{
		unset($_SESSION[$key]);
	}

	/**
	 * Remove index key from array in session
	 *
	 * @param string $key
	 * @param int $indexKey
	 * @return void
	 */
	public function removeArrayKey($key, $indexKey)
	{
		unset($_SESSION[$key][$indexKey]);
	}

	/**
	 * Get value from session by key then remove it
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function pull($key)
	{
		$value = $this->get($key);
		$this->remove($key);
		return $value;
	}

	/**
	 * Get all session data
	 *
	 * @return array
	 */
	public function all()
	{
		return $_SESSION;
	}

	/**
	 * Destroy session
	 *
	 * @return void
	 */
	public function destroy()
	{
		session_destroy();
		unset($_SESSION);
	}
}