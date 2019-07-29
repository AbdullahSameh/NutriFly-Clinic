<?php

namespace System\View;

use System\File;

class View implements ViewInterface
{
	/**
	 * File object
	 *
	 * @var \System\File
	 */
	private $file;

	/**
	 * View path
	 *
	 * @var string
	 */
	private $viewPath;

	/**
	 * The passed data['variables'] to the view path
	 *
	 * @var array
	 */
	private $data = [];

	/**
	 * the output from the view file
	 *
	 * @var string
	 */
	private $output;

	/**
	 * Constructor
	 *
	 * @param \System\File $file
	 * @param string $viewPath
	 * @param array $data
	 * @return \System\View\ViewInterface
	 */
	public function __construct(File $file, $viewPath, array $data)
	{
		$this->file = $file;
		$this->preparePath($viewPath);
		$this->data = $data;
	}

	/**
	 * Prepare view path
	 *
	 * @param string $viewPath
	 * @return void
	 */
	private function preparePath($viewPath)
	{
		$relativeViewPath = 'App/Views/' . $viewPath . '.php';
		$this->viewPath = $this->file->to($relativeViewPath);
		if (! $this->viewFileExists($relativeViewPath)) {
			die($viewPath . ' View Does not exists in Views folder');
		}
	}

	/**
	 * Check if the view file exists
	 *
	 * @param string $viewPath
	 * @return bool
	 */
	private function viewFileExists($viewPath)
	{
		return $this->file->exists($viewPath);
	}

	/**
	 * Get the view output
	 *
	 * @return string
	 */
	public function getOutput()
	{
		if (is_null($this->output)) {
			ob_start();
			extract($this->data);
			include $this->viewPath;
			$this->output = ob_get_clean();
		}
		return $this->output;
	}

	/**
	 * Covert the view object to string in printing
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->getOutput();
	}
}