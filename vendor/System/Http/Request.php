<?php 

namespace System\Http;


class Request
{
	/**
	 * Url
	 * 
	 * @var string
	 */
	private $url;

	/**
	 * Base Url
	 * 
	 * @var string
	 */
	private $baseUrl;

	/**
	 * Upload files container
	 * 
	 * @var array
	 */
	private $files = [];

	/**
	 * Prepare url
	 * 
	 * @param void
	 */
	public function prepareUrl()
	{
		$script = dirname($this->server('SCRIPT_NAME'));
		$requestUri = $this->server('REQUEST_URI');
		
		if (strpos($requestUri, '?') !== false) {
			list($requestUri, $queryString) = explode('?', $requestUri);
		}
		$this->url = rtrim(preg_replace('#^' . $script . '#', '', $requestUri), '/');

		if (! $this->url) { $this->url = '/'; }

		$this->baseUrl = $this->server('REQUEST_SCHEME') . '://' . $this->server('HTTP_HOST') . $script;
	}

	/**
	 * Get value from _GET by key
	 * 
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public function get($key, $default = null)
	{
		return array_get($_GET, $key, $default);
	}

	/**
	 * Get value from _POST by key
	 * 
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public function post($key, $default = null)
	{
		return array_get($_POST, $key, $default);
	}

	/**
	 * Get value from _SERVER by key
	 * 
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public function server($key, $default = null)
	{
		return array_get($_SERVER, $key, $default);
	}

	/**
	 * Get current request method
	 *
	 * @return string
	 */
	public function method()
	{
		return $this->server('REQUEST_METHOD');
	}

	/**
	 * Get referer link
	 *
	 * @return string
	 */
	public function referer()
	{
		return $this->server('HTTP_REFERER');
	}

	/**
	 * Set value to _POST by given key
	 * 
	 * @param string $key
	 * @param mixed $value
	 * @return mixed
	 */
	public function setPost($key, $value)
	{
		$_POST[$key] = $value;
	}

	/**
	 * Get full url of the script
	 *
	 * @return string
	 */
	public function baseUrl()
	{
		return $this->baseUrl;
	}

	/**
	 * Get only relative url (clean url)
	 *
	 * @return string
	 */
	public function url()
	{
		return $this->url;
	}

	/**
	 * Get upload file object for the input
	 *
	 * @param string $input
	 * @return \System\Http\UploadFiles
	 */
	public function UploadFile($input)
	{
		if (isset($this->files[$input])) {
			return $this->files[$input];
		}
		$UploadFile = new UploadFiles($input);

		$this->files[$input] = $UploadFile;
		
		return $this->files[$input];
	}
}