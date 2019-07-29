<?php

namespace System;

class Validation
{
	/**
	 * Application Object
	 * 
	 * @var \System\Application
	 */
	private $app;

	/**
	 * Errors container
	 * 
	 * @var array
	 */
	private $errors = [];

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
	 * Check csrf token
	 * 
	 * @param string $inputName
	 * @param string $errorMessage
	 * @return mixed
	 */
	public function checkToken($inputName, $errorMessage = null)
	{
		if ($this->hasError($inputName)) {
			return $this;
		}
		$inputValue = $this->value($inputName);
		$csrf = $this->app->csrf->check($inputValue);
		if (! $csrf) {
			$message = $errorMessage ?: lang('csrf_token');
			$this->addToError($inputName, $message);
		}
		return $this;
	}

	/**
	 * Check if the input is empty
	 * 
	 * @param string $inputName
	 * @param string $errorMessage
	 * @return $this
	 */
	public function required($inputName, $errorMessage = null)
	{
		if ($this->hasError($inputName)) {
			return $this;
		}
		$inputValue = $this->value($inputName);

		if ($inputValue === '') {
			$message = $errorMessage ?: sprintf('%s is required', ucfirst($inputName));
			$this->addToError($inputName, $message);
		}
		return $this;
	}

	/**
	 * Check if the input has valid email
	 * 
	 * @param string $inputName
	 * @param string $errorMessage
	 * @return $this
	 */
	public function email($inputName, $errorMessage = null)
	{
		if ($this->hasError($inputName)) {
			return $this;
		}
		$inputValue = $this->value($inputName);

		if (! filter_var($inputValue, FILTER_VALIDATE_EMAIL)) { 
			$message = $errorMessage ?: sprintf('%s is not valid email', ucfirst($inputName));
			$this->addToError($inputName, $message);
		}
		return $this;
	}

	/**
	 * Check if the first input matches the second input
	 * 
	 * @param string $firstInput
	 * @param string $secondInput
	 * @param string $errorMessage
	 * @return $this
	 */
	public function match($firstInput, $secondInput, $errorMessage = null)
	{
		$firstInputValue = $this->value($firstInput);
		$secondInputValue = $this->value($secondInput);

		if ($firstInputValue != $secondInputValue) {
			$message = $errorMessage ?: sprintf('%s does not match %s', ucfirst($firstInput), ucfirst($secondInput));
			$this->addToError($secondInput, $message);
		}
		return $this;
	}

	/**
	 * Check if the input value is unique in database
	 * 
	 * @param string $inputName
	 * @param array $databaseData
	 * @param string $errorMessage
	 * @return $this
	 */
	public function unique($inputName, array $databaseData, $errorMessage = null)
	{
		if ($this->hasError($inputName)) {
			return $this;
		}
		$inputValue = $this->value($inputName);
		$table = null;
		$column = null;
		$exceptionCoulmn = null;
		$exceptionCoulmnValue = null;

		if (count($databaseData) == 2) {
			list($table, $column) = $databaseData;
		} elseif (count($databaseData) == 4) {
			list($table, $column, $exceptionCoulmn, $exceptionCoulmnValue) = $databaseData;
		}
		if ($exceptionCoulmn && $exceptionCoulmnValue) {
			$result = $this->app->db->select($column)
									->from($table)
									->where($column . ' = ? AND ' . $exceptionCoulmn . ' != ?', $inputValue, $exceptionCoulmnValue)
									->fetch();
		} else {	
			$result = $this->app->db->select($column)
									->from($table)
									->where($column . ' = ?', $inputValue)
									->fetch();
		}
		if ($result) {
			$message = $errorMessage ?: sprintf('%s already exists', ucfirst($inputName));
			$this->addToError($inputName, $message);
		}
	}

		/**
	 * Check if the input value is float
	 * 
	 * @param string $inputName
	 * @param string $errorMessage
	 * @return $this
	 */
	public function number($inputName, $errorMessage = null)
	{
		if ($this->hasError($inputName)) {
			return $this;
		}
		$inputValue = $this->value($inputName);
		if (! is_numeric($inputValue)) {
			$message = $errorMessage ?: sprintf('%s accepts only number digit', ucfirst($inputName));
			$this->addToError($inputName, $message);
		}
		return $this;
	}

	/**
	 * Check if the input value is float
	 * 
	 * @param string $inputName
	 * @param string $errorMessage
	 * @return $this
	 */
	public function float($inputName, $errorMessage = null)
	{
		if ($this->hasError($inputName)) {
			return $this;
		}
		$inputValue = $this->value($inputName);
		if (! is_float($inputValue)) {
			$message = $errorMessage ?: sprintf('%s accepts only floats digit', ucfirst($inputName));
			$this->addToError($inputName, $message);
		}
		return $this;
	}

	/**
	 * Check if the length of input value <= the given length
	 * 
	 * @param string $inputName
	 * @param int $length
	 * @param string $errorMessage
	 * @return $this
	 */
	public function minLen($inputName, $length, $errorMessage = null)
	{
		if ($this->hasError($inputName)) {
			return $this;
		}
		$inputValue = $this->value($inputName);

		if (strlen($inputValue) < $length) {
			$message = $errorMessage ?: sprintf('%s must be more than %d chrcters', ucfirst($inputName), $length);
			$this->addToError($inputName, $message);
		}
		return $this;
	}

	/**
	 * Check if the length of input value >= the given length
	 * 
	 * @param string $inputName
	 * @param int $length
	 * @param string $errorMessage
	 * @return $this
	 */
	public function maxLen($inputName, $length, $errorMessage = null)
	{
		if ($this->hasError($inputName)) {
			return $this;
		}
		$inputValue = $this->value($inputName);

		if (strlen($inputValue) > $length) {
			$message = $errorMessage ?: sprintf('%s must be less than %d chrcters', ucfirst($inputName), $length);
			$this->addToError($inputName, $message);
		}
		return $this;
	}

	/**
	 * Add custom error message
	 * 
	 * @param string $message
	 * @return $this
	 */
	public function message($message)
	{
		$this->errors[] = $message;
		return $this;
	}

	/**
	 * Check if there are any invalid inputs
	 * 
	 * @return bool
	 */
	public function fails()
	{
		return ! empty($this->errors);
	}

	/**
	 * Check if the all inputs are valid
	 * 
	 * @return bool
	 */
	public function passes()
	{
		return empty($this->errors);
	}

	/**
	 * Get all errors
	 * 
	 * @return array
	 */
	public function getMessage()
	{
		return $this->errors;
	}

	/**
	 * Split errors and make it as a string imploded with break
	 * 
	 * @return string
	 */
	public function splitMessage()
	{
		return implode('<br>', $this->errors);
	}

	/**
	 * Get the value of input
	 * 
	 * @param string $input
	 * @return mixed
	 */
	private function value($input)
	{
		return $this->app->request->post($input);
	}

	/**
	 * Add input error
	 * 
	 * @param string $inputName
	 * @param string $message
	 * @return void
	 */
	private function addToError($inputName, $message)
	{
		$this->errors[$inputName] = $message;
	}

	/**
	 * Check if the input already has errors
	 * 
	 * @param string $inputName
	 * @return void
	 */
	private function hasError($inputName)
	{
		return array_key_exists($inputName, $this->errors);
	}
}