<?php


namespace RestIgniter\Models;


class SessionConfiguration
{
	public string $driver;
	public string $table_name;
	public string $cookie_name;
	public int $expiration;
	public string $save_path;
	public bool $match_ip;
	public int $time_to_update;
	public bool $regenerate_destroy;


	public function __construct(array $params = []) {
		if (empty($params)) throw new \Exception("Invalid session params");

		$this->driver = element("driver", $params, "files");
		$this->table_name = element("table_name", $params, "");

		if ($this->driver == "db" && is_null_or_empty($this->table_name))
			throw new \Exception("Invalid session table name");

		$this->cookie_name = element("cookie_name", $params, "ri_session");
		$this->expiration = element("expiration", $params, 7200);
		$this->match_ip = element("match_ip", $params, false);
		$this->time_to_update = element("time_to_update", $params, 300);
		$this->regenerate_destroy = element("regenerate_destroy", $params, false);

	}
}

