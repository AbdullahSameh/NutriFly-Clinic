<?php 

namespace System;

use Closure;
use Exception;

class Application
{
	/**
	 * Application Container
	 *
	 * @var array
	 */
	private $container = [];

	/**
	 * Application object
	 *
	 * @var \System\Application
	 */
	private static $instance;

	/**
	 * Constructor
	 *
	 * @param \System\File $file
	 */
	private function __construct(File $file)
	{
		$this->share('file', $file);
		//$this->registerClasses();
		$this->share('config', $this->file->includeFile('config.php'));
		$this->loadHelpers();
		/* $whoops = new \Whoops\Run;
		$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
		$whoops->register(); */
	}

	/**
	 * Get instance of Application 
	 *
	 * @param \System\File $file
	 * @return \System\Application
	 */
	public static function getInstance($file = null)
	{
		if (is_null(static::$instance)) {
			static::$instance = new static($file);
		}
		return static::$instance;
	}

	/**
	 * Run The Application
	 *
	 * @return void
	 */
	public function run()
	{
		$this->session->start();
		$this->request->prepareUrl();
		$routes = ['index.php'];
		foreach ($routes as $route) {
			$this->file->includeFile('routes/' . $route);
		}
		//$this->file->includeFile('App/index.php');
		$output = $this->route->getProperRoute();
		/* if ($this->route->hasCallFirst()) {
			$this->route->callFirstCalls();
		} */
		//$output = (string) $this->load->action($controller, $method, $arguments);
		$this->response->setOutput($output);
		$this->response->send();
	}

	/**
	 * Share the key|value through Application
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return mixed
	 */
	public function share($key, $value)
	{
		if ($value instanceof Closure) {
			$value = call_user_func($value, $this);
		}
		$this->container[$key] = $value;
	}

	/**
	 * Register Classes in spl auto load register
	 *
	 * @return voied
	 */
	private function registerClasses()
	{
		spl_autoload_register([$this, 'load']);
	}

	/**
	 * Load class through autoloading
	 *
	 * @param string $class
	 * @return void
	 */
	public function load($class)
	{
		if (strpos($class, 'App') === 0) {
			// Get class from App
			$file = $class . '.php';
		} else {
			// Get class from vendor\System
			$file = 'vendor/' . $class . '.php';
		}
		if ($this->file->exists($file)) {
			$this->file->includeFile($file);
		}
	}

	/**
	 * Get shared value
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function get($key)
	{
		if (! $this->isSharing($key)) {
			if ($this->isCoreAlias($key)) {
				$this->share($key, $this->createNewCoreObject($key));
			} else {
				throw new Exception("$key Not Found in Application Container");
			}
		}
		return $this->container[$key];
	}

	/**
	 * Check if the key is shared through application
	 *
	 * @param string $key
	 * @return bool
	 */
	public function isSharing($key)
	{
		return isset($this->container[$key]);
	}

	/**
	 * Check if the key is an alias in core classes
	 *
	 * @param string $alias
	 * @return bool
	 */
	private function isCoreAlias($alias)
	{
		$coreClasses = $this->coreClasses();
		return isset($coreClasses[$alias]);
	}

	/**
	* Create new object for the core class basd on the given alias
	*
	* @param string $alias
	* @return object
	*/
	private function createNewCoreObject($alias)
	{
		$coreClasses = $this->coreClasses();
		$object = $coreClasses[$alias];
		return new $object($this);
	}

	/**
	* Get all core Classes with its aliases
	*
	* @return array
	*/
	private function coreClasses()
	{
		return [
			'request' 		=> 'System\\Http\\Request',
			'response' 		=> 'System\\Http\\Response',
			'session' 		=> 'System\\Session',
			'route' 		=> 'System\\Route',
			'cookie' 		=> 'System\\Cookie',
			'load' 			=> 'System\\Loader',
			'html' 			=> 'System\\Html',
			'db' 			=> 'System\\Database',
			'url' 			=> 'System\\Url',
			'csrf' 			=> 'System\\Csrf',
			'validator' 	=> 'System\\Validation',
			'pagination' 	=> 'System\\Pagination',
			'view' 			=> 'System\\View\\ViewFactory',
		];
	}

	/**
	 * Get shared value dynamically
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function __get($key)
	{
		return $this->get($key);
	}

	/**
	 * Load Helper file
	 *
	 * @return void
	 */
	private function loadHelpers()
	{
		$file = $this->file->includeFile('vendor/System/helper.php');
	}
}