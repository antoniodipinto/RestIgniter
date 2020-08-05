<?php


namespace RestIgniter\Models;


class BaseConfiguration
{
	public string $base_url;
	public string $index_page;
	public string $uri_protocol;
	public string $time_reference;
	public bool $compression_output;
	public string $language;
	public string $charset;
	public bool $enable_hook;
	public bool $composer_autoload;
	public string $permitted_uri_chars;
	public bool $enable_query_strings;
	public string $controller_trigger;
	public string $function_trigger;
	public string $directory_trigger;
	public string $error_views_path;
	public string $cache_path;
	public bool $cache_query_string;
	public string $encryption_key;


	public function __construct(array $params = []) {
		if (empty($params)) throw new \Exception("Invalid base params");

		$this->base_url = element("base_url", $params, "");
		$this->index_page = element("index_page", $params, "");
		$this->uri_protocol = element("uri_protocol", $params, "");
		$this->time_reference = element("time_reference", $params, "");
		$this->compression_output = element("compression_output", $params, false);
		$this->language = element("language", $params, "");
		$this->charset = element("charset", $params, "");
		$this->enable_hook = element("enable_hook", $params, "");
		$this->composer_autoload = element("composer_autoload", $params, "");
		$this->permitted_uri_chars = element("permitted_uri_chars", $params, "");
		$this->enable_query_strings = element("enable_query_strings", $params, "");
		$this->controller_trigger = element("controller_trigger", $params, "");
		$this->function_trigger = element("function_trigger", $params, "");
		$this->directory_trigger = element("directory_trigger", $params, "");
		$this->error_views_path = element("error_views_path", $params, "");
		$this->cache_path = element("cache_path", $params, "");
		$this->cache_query_string = element("cache_query_string", $params, false);
		$this->encryption_key = element("encryption_key", $params, "");
	}
}

