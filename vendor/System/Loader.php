<?php 

namespace System;


class Loader
{
	/**
	 * Application object
	 *
	 * @var \System\Application
	 */
	private $app;

	/**
	 * Controllers container
	 *
	 * @var array
	 */
	private $controllers = [];

	/**
	 * Models container
	 *
	 * @var array
	 */
	private $models = [];

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
	 * Call the controller with method and pass the arguments to controller method
	 *
	 * @param string $controller
	 * @param string $method
	 * @param array $arguments
	 * @return mixed
	 */
	public function action($controller, $method, array $arguments = [])
	{
		$object = $this->controller($controller);
		return call_user_func_array([$object, $method], $arguments);
	}

	/**
	 * Call the controller 
	 *
	 * @param string $controller
	 * @return object
	 */
	public function controller($controller)
	{
		$controller = $this->getControllerName($controller);

		if (! $this->hasController($controller)) {
			$this->addController($controller);
		}
		return $this->getController($controller);
	}

	/**
	 * Check if the controller exists in the controllers container
	 *
	 * @param string $controller
	 * @return bool
	 */
	private function hasController($controller)
	{
		return array_key_exists($controller, $this->controllers);
	}

	/**
	 * Create new object controller and store it in the controllers container
	 *
	 * @param string $controller
	 * @return void
	 */
	private function addController($controller)
	{
		$object = new $controller($this->app);
		$this->controllers[$controller] = $object;
	}

	/**
	 * Get the controller object from the controllers container
	 *
	 * @param string $controller
	 * @return object
	 */
	private function getController($controller)
	{
		return $this->controllers[$controller];
	}

	/**
	 * Get the full class name for controller object 
	 *
	 * @param string $controller
	 * @return string
	 */
	private function getControllerName($controller)
	{
		$controller .= 'Controller';
		$controller = 'App\\Controllers\\' . $controller;
		return str_replace('/', '\\', $controller);
	}

	/**
	 * Call the model 
	 *
	 * @param string $model
	 * @return object
	 */
	public function model($model)
	{
		$model = $this->getModelName($model);

		if (! $this->hasModel($model)) {
			$this->addModel($model);
		}
		return $this->getModel($model);
	}

	/**
	 * Check if the model exists in the models container
	 *
	 * @param string $model
	 * @return bool
	 */
	private function hasModel($model)
	{
		return array_key_exists($model, $this->models);
	}

	/**
	 * Create new object model and store it in the models container
	 *
	 * @param string $model
	 * @return void
	 */
	private function addModel($model)
	{
		$object = new $model($this->app);
		$this->models[$model] = $object;
	}

	/**
	 * Get the model object 
	 *
	 * @param string $model
	 * @return object
	 */
	private function getModel($model)
	{
		return $this->models[$model];
	}

	/**
	 * Get the full class name for model object 
	 *
	 * @param string $model
	 * @return string
	 */
	private function getModelName($model)
	{
		$model .= 'Model';
		$model = 'App\\Models\\' . ucfirst($model);
		return str_replace('/', '\\', $model);
	}
}