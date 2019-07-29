<?php

namespace System\View;

use System\Application;

class ViewFactory
{
	/**
	 * Application object
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
	 * Render the view path with the passed variables
	 * and generate new View object for it
	 *
	 * @param string $viewPath
	 * @param array $data
	 * @return \System\View\ViewInterface
	 */
	public function render($viewPath, array $data = [])
	{
		return new View($this->app->file, $viewPath, $data);
	}
}