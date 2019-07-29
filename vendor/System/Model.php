<?php 

namespace System;


abstract class Model
{
	/**
	 * Application object
	 *
	 * @var \System\Application
	 */
	protected $app;

	/**
	 * Users table
	 *
	 * @var string
	 */
	protected $table;

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
	 * Get all records
	 *
	 * @return array
	 */
	public function all()
	{
		return $this->fetchAll($this->table);
	}

	/**
	 * Get record by id
	 *
	 * @param int $id
	 * @return \stdClass || null
	 */
	public function get($id)
	{
		return $this->where('id = ?', $id)->fetch($this->table);
	}
	
	/**
	 * Delete record by id
	 * 
	 * @param int $id
	 * @return void
	 */
	public function delete($id)
	{
		return $this->where('id = ?', $id)->delete($this->table);
	}

	/**
	 * Check if the given value of key is exists in table
	 * 
	 * @param mixed $value
	 * @param string $key
	 * @return bool
	 */
	public function tableValExists($value , $key = 'id')
	{
		return (bool) $this->select($key)->where($key . ' = ? ', $value)->fetch($this->table);
	}

	/**
	 * Call shared Application object dynamically
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function __get($key)
	{
		return $this->app->get($key);
	}

	/**
	 * Call database methods dynamically
	 *
	 * @param string $mothed
	 * @param array $args
	 * @return mixed
	 */
	public function __call($mothed, $args)
	{
		return call_user_func_array([$this->app->db, $mothed], $args);
	}
}