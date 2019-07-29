<?php 

namespace System;

use Exception;

class Route
{
	/**
	 * NEXT flag
	 *
	 * @const string
	 */
	const NEXT = '__NEXT__';

	/**
	 * Application object
	 *
	 * @var \System\Application
	 */
	private $app;

	/**
	 * Route container
	 *
	 * @var array
	 */
	private $routes = [];

	/**
	 * Current Route
	 * 
	 * @var array
	 */
	private $current = [];

	/**
	 * Prefix url
	 *
	 * @var string
	 */
	private $prefix;

	/**
	 * Base controller
	 *
	 * @var string
	 */
	private $controller;

	/**
	 * Group middleware
	 *
	 * @var array
	 */
	private $middleware = [];
	
	/**
	 * Not found url
	 *
	 * @var string
	 */
	private $notFound;
	
	/**
	 * Calls container
	 * 
	 * @var array
	 */
	//private $calls = [];

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
	 * Add route to group
	 *
	 * @param array $groupOptions
	 * @param callable $callback
	 * @return $this
	 */
	public function group(array $groupOptions, callable $callback)
	{
		$prefix = array_get($groupOptions, 'prefix');
		$controller = array_get($groupOptions, 'controller');
		$middleware = (array) array_get($groupOptions, 'middleware');

		if (($this->prefix && $prefix != $this->prefix) || ($prefix && strpos($this->app->request->url(), $prefix) !==0)) {
			//die($prefix);
			//echo $prefix;
			return $this;
		}
		// echo $this->app->request->url();
		// die;
		if ($prefix) {
			$this->prefix = $prefix;
		}
		$this->controller = $controller;
		$this->middleware = $middleware;
		call_user_func($callback, $this);
		return $this;
	}

	/**
	 * Add new route
	 *
	 * @param string $url
	 * @param string $action
	 * @param string $requestMethod
	 * @param array $middleware
	 * @return void
	 */
	public function add($url, $action, $requestMethod = 'GET', $middleware = [])
	{
		//echo $url; die;
		if ($this->prefix) {
			if ($this->prefix != '/') {
				$url = rtrim($this->prefix . $url, '/');
			}
			if (! $url) $url = '/';
		}
		if ($this->controller) {
			$action = $this->controller . '/' . $action;
		}
		if ($this->middleware) {
			$middleware = array_merge($this->middleware, $middleware);
		}
		$route = [
			'url' 		=> $url,
			'pattern' 	=> $this->generatePattern($url),
			'action' 	=> $this->getAction($action),
			'method' 	=> strtoupper($requestMethod),
			'middleware' 	=> $middleware,
		];
		$this->routes[] = $route;
	}

	/**
	 * Generate a regex pattern for the url
	 *
	 * @param string $url
	 * @return string
	 */
	private function generatePattern($url)
	{
		$pattern = '#^';  /*[a-zA-Z0-9-]*/
		$pattern .= str_replace([':text', ':id'], ['([a-zA-Z0-9-]+)', '(\d+)'], $url);
		$pattern .= '$#';
		return $pattern;
	}

	/**
	 * Get the action
	 *
	 * @param string $action
	 * @return string
	 */
	private function getAction($action)
	{
		$action = str_replace('/', '\\', $action);
		return strpos($action, '@') !== false ? $action : $action . '@index';
	}

	/**
	 * Get proper route and send output to Application
	 *
	 * @return string
	 */
	public function getProperRoute()
	{
		$middlewareInterface = 'App\\Middleware\\MiddlewareInterface';
		//pre($this->routes);
		foreach ($this->routes as $route) {
			if ($this->isMatching($route['pattern']) && $this->isMatchingRequestMethod($route['method'])) {
				$this->current = $route;
				$output = '';
				if ($route['middleware']) {
					foreach ($route['middleware'] as $middleware) {
						// check if the middleware implements the middleware interface
						$middlewareClass = 'App\\Middleware\\' . $middleware;
						if (! in_array($middlewareInterface, class_implements($middlewareClass))) {
							throw new Exception(sprintf('%s Must implements %s', $middleware, $middlewareInterface));
						}
						$middlewareObject = new $middlewareClass;
						$output = $middlewareObject->handle($this->app, static::NEXT);
						if($output === static::NEXT) {
							$output = '';
						} else {
							break;
						}
					}
				}
				if ($output == '') {
					$arguments = $this->getArgumentsFrom($route['pattern']);
					list($controller, $method) = explode('@', $route['action']);
					$output = (string) $this->app->load->action($controller, $method, $arguments);
				}
				return $output;
			}
		}
		return $this->app->url->redirectTo($this->notFound);
	}

	/**
	 * Check if the pattern matches the current request url
	 *
	 * @param string $pattern
	 * @return bool
	 */
	private function isMatching($pattern)
	{
		return preg_match($pattern, $this->app->request->url());
	}

	/**
	 * Check if the method matches the current request method
	 *
	 * @param string $routeMethod
	 * @return bool
	 */
	private function isMatchingRequestMethod($routeMethod)
	{
		return $routeMethod == $this->app->request->method();
	}

	/**
	 * Get arguments from the the current request url based on pattern
	 *
	 * @param string $pattern
	 * @return array
	 */
	private function getArgumentsFrom($pattern)
	{
		preg_match($pattern, $this->app->request->url(), $matches);
		array_shift($matches);
		return $matches;
	}

	/**
	 * Add package of routes for CRUD
	 *
	 * @param string $url
	 * @param string $controller
	 * @return $this
	 */
	public function package($url, $controller)
	{
		$this->add($url, $controller);
		$this->add($url . '/add', $controller . '@add', 'POST');
		$this->add($url . '/submit', $controller . '@submit', 'POST');
		$this->add($url . '/edit/:id', $controller . '@edit', 'POST');
		$this->add($url . '/save/:id', $controller . '@save', 'POST');
		$this->add($url . '/delete/:id', $controller . '@delete', 'POST');
	}

	/**
	 * Set not found url
	 *
	 * @param string $url
	 * @return void
	 */
	public function notFound($url)
	{
		$this->notFound = $url;
	}

	/**
	 * Get all routes
	 *
	 * @return array
	 */
	public function routes()
	{
		return $this->routes;
	}

	/**
	 * Get current route url  
	 * 
	 * @var string
	 */
	public function getCurrentRouteUrl()
	{
		return $this->current['url'];
	}

	/**
	 * Call the  callback before calling the main controller 
	 * 
	 * @var callable $callable
	 * @return $this
	 */
	/* public function callFirst(callable $callable)
	{
		$this->calls['first'][] = $callable;
		return $this;
	} */

	/**
	 * Check if there any callbacks that will be called before 
	 * calling the main controller
	 * 
	 * @return bool
	 */
	/* public function hasCallFirst()
	{
		return ! empty($this->calls['first']);
	} */

	/**
	 * Call all callbacks that will be called before
	 * calling the main controller
	 * 
	 * @return bool
	 */
	/* public function callFirstCalls()
	{
		foreach ($this->calls['first'] as $call) {
			call_user_func($call, $this->app);
		}
	} */
}