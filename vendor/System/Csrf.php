<?php

namespace System;

class Csrf
{
	/**
	 * Application Object
	 * 
	 * @var \System\Application
	 */
	private $app;

	/**
	 * The generated csrf token
	 * 
	 * @var string
	 */
	private $token;

	/**
	 * Constructor
	 * 
	 * @param \System\Application $app
	 */
	public function __construct(Application $app)
	{
        $this->app = $app;
        //$this->generate();
	}
	
	/**
	 * Generate csrf token
	 * 
	 * @return void
	 */
	public function generate()
	{
		$token = bin2hex(openssl_random_pseudo_bytes(32));
		$this->app->session->set('token', $token);
		//$this->token = $token;
		return $token;
	}

	/**
	 * Check csrf token
	 * 
	 * @return bool
	 */
	public function check($token)
	{
		if ($this->app->session->has('token') && $this->app->session->get('token') === $token) {
			$this->app->session->remove('token');
			return true;
		}
		return false;
	}

	/**
	 * Create csrf token field
	 * 
	 * @return string
	 */
	public function csrf_field()
	{
		return '<input type="hidden" name="token" value="'. $this->generate() .'">'; 
	}
} 