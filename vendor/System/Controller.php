<?php 

namespace System;

abstract class Controller
{
	/**
	 * Application object
	 *
	 * @var \System\Application
	 */
	protected $app;

	/**
	 * Errors container
	 *
	 * @var array
	 */
	protected $errors = [];

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
	 * Call shared Application object dynamically
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function __get($key)
	{
		return $this->app->get($key);
	}

	/**
	 * Encode the given value in json
	 * 
	 * @var mixed $data
	 * @return string
	 */
	public function json($data)
	{
		return json_encode($data);
	}
}