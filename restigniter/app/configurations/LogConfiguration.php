<?php


namespace RestIgniter\Models;


class LogConfiguration
{

	public int $threshold;
	public string $path;
	public string $file_extension;
	public string $file_permissions;
	public string $date_format;

	public function __construct(array $params = []) {
		if (empty($params)) throw new \Exception("Invalid base params");

		$this->threshold = element("threshold", $params, 0);
		$this->path = element("path", $params, "");
		$this->file_extension = element("file_extension", $params, "log");
		$this->file_permissions = element("file_permissions", $params, "0644");
		$this->date_format = element("date_format", $params, "Y-m-d H:i:s");
	}
}

