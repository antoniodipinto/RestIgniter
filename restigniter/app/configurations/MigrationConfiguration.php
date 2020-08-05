<?php


namespace RestIgniter\Models;


class MigrationConfiguration
{
	public string $type;
	public string $table;
	public bool $auto_latest;

	public function __construct(array $params = []) {
		if (empty($params)) throw new \Exception("Invalid migration params");

		$this->type = element("type", $params, "files");
		$this->table = element("table", $params, "");

		if ($this->type == "db" && is_null_or_empty($this->table))
			throw new \Exception("Invalid migration table");

		$this->auto_latest = element("auto_latest", $params, false);
	}
}

