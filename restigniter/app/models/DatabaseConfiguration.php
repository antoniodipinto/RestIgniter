<?php


namespace RestIgniter\Models;


class DatabaseConfiguration
{
	public string $name;
	public string $driver;
	public bool $default;
	public string $hostname;
	public string $username;
	public string $password;
	public string $database;
	public string $charset;
	public string $collation;
	public bool $encrypt;
	public bool $compress;
	public bool $strict;
	public array $failover;
	public bool $save_queries;


	public function __construct(array $params = []) {
		if (empty($params)) throw new \Exception("Invalid database params");

		$this->name = $params["name"];
		$this->driver = $params["driver"];
		$this->default = $params["default"];
		$this->hostname = $params["hostname"];
		$this->username = $params["username"];
		$this->password = $params["password"];
		$this->database = $params["database"];
		$this->charset = $params["charset"];
		$this->collation = $params["collation"];
		$this->encrypt = $params["encrypt"];
		$this->compress = $params["compress"];
		$this->strict = $params["strict"];
		$this->failover = $params["failover"];
		$this->save_queries = $params["save_queries"];
	}

}
