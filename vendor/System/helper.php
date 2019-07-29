<?php

use System\Application;

if (! function_exists('app')) {

	/**
	 * Get Application instance
	 *
	 * @return \System\Application
	 */
	function app()
	{
		return Application::getInstance();
	}
}

if (! function_exists('pre')) {

	/**
	 * Visualize the given variable in browser
	 *
	 * @param mixed @var
	 * @return void
	 */
	function pre($var)
	{
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}
}

if (! function_exists('pred')) {

	/**
	 * Visualize the given variable in browser and exit the application
	 *
	 * @param mixed @var
	 * @return void
	 */
	function pred($var)
	{
		pre($var);
		die;
	}
}

if (! function_exists('array_get')) {

	/**
	 * Get the value from array by key if found | else get the default value
	 *
	 * @param array $array
	 * @param string|int $key
	 * @param mixed $default
	 * @return mixed
	 */
	function array_get($array , $key, $default = null)
	{
		return isset($array[$key]) ? $array[$key] : $default;
	}
}

if (! function_exists('_e')) {

	/**
	 * Escape the value form html tags
	 *
	 * @param string $value
	 * @return string
	 */
	function _e($value)
	{
		return htmlspecialchars($value);
	}
}

if (! function_exists('reach')) {

	/**
	 * Generate full path for the given path in public directory 
	 * 
	 * @param string $path
	 * @param string
	 */
	function reach($path)
	{
		//$app = Application::getInstance();
		return app()->url->link('/public/' . $path);
	}
}

if (! function_exists('url')) {

	/**
	 * Generate full path for the given path 
	 * 
	 * @param string $path
	 * @param string
	 */
	function url($path)
	{
		//$app = Application::getInstance();
		return app()->url->link($path);
	}
}

if (! function_exists('strTrim')) {

	/**
	 * Remove any unwanted characters from the string and replace it with "-"
	 * 
	 * @param string $string
	 * @return string
	 */
	function strTrim($string)
	{
		// remove any white spaces from the beginning and the end of the string
        $string = trim($string);

		// replace any non English or numeric characters and dashes with white space
		$string = preg_replace('#[^\wا-ي]#', ' ', $string);

		// replace any multi white spaces with just one white space
		$string = preg_replace('#[\s]+#', ' ', $string);

		// replace white spaces with dash
		$string = str_replace(' ', '-', $string);

		// make all letters in lowercase

		return trim(strtolower($string), '-');
	}
}

if (! function_exists('csrf_field')) {

	/**
	 * Create a CSRF token field for form
	 * 
	 * @param string
	 */
	function csrf_field()
	{
		return app()->csrf->csrf_field();
	}
}