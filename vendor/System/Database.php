<?php

namespace System;

use PDO;
use PDOException;

class Database
{
    /**
     * Application object
     *
     * @var \System\Application
     */
    private $app;

    /**
     * PDO connection
     *
     * @var \PDO
     */
    private static $connection;

    /**
     * Table name
     *
     * @var string
     */
    private $table;

    /**
     * The data that will store in database
     *
     * @var array
     */
    private $data = [];

    /**
     * Bindings container
     *
     * @var array
     */
    private $bindings = [];

    /**
     * Last insert id
     *
     * @var int
     */
    private $lastId;

    /**
     * Wheres container
     *
     * @var array
     */
    private $wheres = [];

    /**
     * Havings container
     *
     * @var array
     */
    private $havings = [];

    /**
     * Order the records
     *
     * @var array
     */
    private $orders = [];

    /**
     * Group by
     *
     * @var array
     */
    private $groups = [];

    /**
     * Selects container
     *
     * @var array
     */
    private $selects = [];

    /**
     * Joins container
     *
     * @var array
     */
    private $joins = [];

    /**
     * Number of limt records
     *
     * @var int
     */
    private $limit;

    /**
     * Start Getting records from this offset
     *
     * @var int
     */
    private $offset;

    /**
     * Total rows
     *
     * @var int
     */
    private $rows = 0;

    /**
     * Constructor
     *
     * @param \System\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        if (! $this->isConnected()) {
            $this->connect();
        }
    }

    /**
     * Chech if there is any connection to database
     *
     * @return bool
     */
    private function isConnected()
    {
        return static::$connection instanceof PDO;
    }

    /**
     * Connect to database
     *
     * @return void
     */
    private function connect()
    {
        $connectionData = (array) array_get($this->app->config, 'db');
        extract($connectionData);
        try {
            static::$connection = new PDO('mysql:host=' . $server . ';dbname=' . $dbname, $dbuser, $dbpass);
            static::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            static::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            static::$connection->exec('SET NAMES utf8');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Get database connection object PDO object
     *
     * @return \PDO
     */
    public function connection()
    {
        return static::$connection;
    }

    /**
     * Set select columns
     *
     * @param string $select
     * @return $this \System\Databsae
     */
    /*public function select($select)
    {
        $this->selects[] = $select;
        return $this;
    }*/
    public function select(...$select)
    {
        $select = func_get_args();
        $this->selects = array_merge($this->selects, $select);
        return $this;
    }

    /**
     * Set the table name
     *
     * @param string $table
     * @return $this \System\Databsae
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * The table name
     *
     * @param string $table
     * @return $this \System\Databsae
     */
    public function from($table)
    {
        return $this->table($table);
    }

    /**
     * Set join table
     *
     * @param string $join
     * @return $this \System\Databsae
     */
    public function join($join)
    {
        $this->joins[] = $join;
        return $this;
    }

    /**
     * Set limit & offset records
     *
     * @param int $limit
     * @param int $offset
     * @return $this \System\Databsae
     */
    public function limit($limit, $offset = 0)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        return $this;
    }

    /**
     * Set orderby to order records
     *
     * @param string $orderBy (column)
     * @param string $sort
     * @return $this \System\Databsae
     */
    public function orderBy($orderBy, $sort = null)
    {
        $this->orders = [$orderBy, $sort];
        return $this;
    }

    /**
     * Set the data that will store in database table
     *
     * @param mixed $key
     * @param mixed $value
     * @return $this \System\Databsae
     */
    public function data($key, $value = null)
    {
        if (is_array($key)) {
            $this->data = array_merge($this->data, $key);
            $this->addToBindings($key);
        } else {
            $this->data[$key] = $value;
            $this->addToBindings($value);
        }
        return $this;
    }

    /**
     * Fetch records from table
     * (this will return only one record)
     *
     * @param string $table
     * @return \stdClass || null
     */
    public function fetch($table = null)
    {
        if ($table) {
            $this->table($table);
        }
        $sql = $this->fetchStatement();

        $result = $this->query($sql, $this->bindings)->fetch();

        $this->reset();

        return $result;
    }

    /**
     * Fetch all records from table
     *
     * @param string $table
     * @return array \stdClass || null
     */
    public function fetchAll($table = null)
    {
        if ($table) {
            $this->table($table);
        }
        $sql = $this->fetchStatement();

        $query = $this->query($sql, $this->bindings);

        $results = $query->fetchAll();

        $this->rows = $query->rowCount();

        $this->reset();

        return $results;
    }

    /**
     * Get total rows from last fetch for all statement
     *
     * @return int
     */
    public function rows()
    {
        return $this->rows;
    }

    /**
     * Prepare Select (fetch) statement
     *
     * @return string $sql
     */
    private function fetchStatement()
    {
        $sql = 'SELECT ';

        if ($this->selects) {
            $sql .= implode(',', $this->selects);
        } else {
            $sql .= '*' ;
        }
        $sql .= ' FROM ' . $this->table . ' ';

        if ($this->joins) {
            $sql .= implode(' ', $this->joins);
        }
        if ($this->wheres) {
            $sql .= ' WHERE ' .  implode(' ', $this->wheres);
        }
        if ($this->havings) {
            $sql .= ' HAVING ' . implode(' ', $this->havings);
        }
        if ($this->orders) {
            $sql .= ' ORDER BY ' .  implode(' ', $this->orders);
        }
        if ($this->limit) {
            $sql .= ' LIMIT ' . $this->limit;
        }
        if ($this->offset) {
            $sql .= ' OFFSET ' . $this->offset;
        }
        if ($this->groups) {
            $sql .= ' GROUP BY ' . implode(' ', $this->groups);
        }
        return $sql;
    }

    /**
     * Insert data to database
     *
     * @param string $table
     * @return $this \System\Databsae
     */
    public function insert($table = null)
    {
        if ($table) {
            $this->table($table);
        }
        $sql = 'INSERT INTO ' . $this->table . ' SET ';

        $sql .= $this->setDataFields();

        $this->query($sql, $this->bindings);

        $this->lastId = $this->connection()->lastInsertId();
        $this->reset();
        return $this;
    }

    /**
     * Update data in database
     *
     * @param string $table
     * @return $this \System\Databsae
     */
    public function update($table = null)
    {
        if ($table) {
            $this->table($table);
        }
        $sql = 'UPDATE ' . $this->table . ' SET ';

        $sql .= $this->setDataFields();
        
        if ($this->wheres) {
            $sql .= ' WHERE ' . implode(' ', $this->wheres);
        }
        $this->query($sql, $this->bindings);
        $this->reset();
        return $this;
    }

    /**
     * Delete data from database
     *
     * @param string $table
     * @return $this \System\Databsae
     */
    public function delete($table = null)
    {
        if ($table) {
            $this->table($table);
        }
        $sql = 'DELETE FROM ' . $this->table . ' ';
        
        if ($this->wheres) {
            $sql .= ' WHERE ' . implode(' ', $this->wheres);
        }
        $this->query($sql, $this->bindings);
        $this->reset();
        return $this;
    }

    /**
     * Add new wheres
     *
     * @return $this \System\Databsae
     */
    public function where()
    {
        // (...$bindings)
        $bindings = func_get_args();
        $sql = array_shift($bindings);
        $this->addToBindings($bindings);
        $this->wheres[] = $sql;
        return $this;
    }

    /**
     * Add new Having
     *
     * @return $this
     */
    public function having()
    {
        // (...$bindings)
        $bindings = func_get_args();
        $sql = array_shift($bindings);
        $this->addToBindings($bindings);
        $this->havings[] = $sql;
        return $this;
    }

    /**
     * Group By clause
     *
     * @param array $arguments => 5.6
     * @return $this
     */
    public function groupBy(...$arguments)
    {
        $this->groups[] = $arguments;
        return $this;
    }

    /**
     * Set feilds form insert & update
     *
     * @return string /$sql/
     */
    private function setDataFields()
    {
        $sql = '';
        // $this->data as $key => $value //
        foreach (array_keys($this->data) as $key) {
            $sql .= '`' . $key . '` = ?, ';
        }
        $sql = rtrim($sql, ', ');
        return $sql;
    }

    /**
     * Add the value to bindins
     *
     * @param mixed $value
     * @return void
     */
    private function addToBindings($value)
    {
        if (is_array($value)) {
            $this->bindings = array_merge($this->bindings, array_values($value));
        } else {
            $this->bindings[] = $value;
        }
    }

    /**
     * Execute the sql statement
     *
     * @return \PDOStatement
     */
    public function query()
    {
        // (...$bindings)
        $bindings = func_get_args();
        $sql = array_shift($bindings);
        if (count($bindings) == 1 && is_array($bindings[0])) {
            $bindings = $bindings[0];
        }
        try {
            $query = $this->connection()->prepare($sql);
            foreach ($bindings as $key => $value) {
                $query->bindValue($key + 1, _e($value));
            }
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo $sql;
            pre($this->bindings);
            die($e->getMessage());
        }
    }

    /**
     * Get last insert id
     *
     * @return int
     */
    public function lastId()
    {
        return $this->lastId;
        ;
    }

    /**
     * Reset all data
     *
     * @return viod
     */
    private function reset()
    {
        $this->limit 	= null;
        $this->offset 	= null;
        $this->table 	= null;
        $this->data 	= [];
        $this->bindings = [];
        $this->selects 	= [];
        $this->joins 	= [];
        $this->wheres 	= [];
        $this->havings 	= [];
        $this->orderBy 	= [];
        $this->groups 	= [];
    }
}
