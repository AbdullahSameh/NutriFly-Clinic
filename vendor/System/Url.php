<?php

namespace System;

class Url
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
	 * Generate full link for given path
	 * 
	 * @param string $path
	 * @return string
	 */
	public function link($path)
	{
		return $this->app->request->baseUrl() . $path;
	}

	/**
	 * Redirect to given path
	 * 
	 * @param string $path
	 * @return void
	 */
	public function redirectTo($path)
	{
		header('location:' . $this->link($path));
		exit;
	}

	/**
	 * Redirect back path
	 * 
	 * @param string $path
	 * @return void
	 */
	public function back()
	{
		header('location:' . $this->app->request->referer());
		exit;
	}
}