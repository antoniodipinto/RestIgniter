<?php


namespace RestIgniter\Models;


class CookieConfiguration
{
	public string $prefix;
	public string $domain;
	public string $path;
	public bool $secure;
	public bool $http_only;

	public function __construct(array $params = []) {
		if (empty($params)) throw new \Exception("Invalid cookie params");

		$this->prefix = element("prefix", $params, "");
		$this->domain = element("domain", $params, "");
		$this->path = element("path", $params, "");
		$this->secure = element("secure", $params, false);
		$this->http_only = element("http_only", $params, false);
	}
}

