<?php


namespace RestIgniter;


use RestIgniter\Models\DatabaseConfiguration;

class Configuration
{

	private static $_instance;

	protected DatabaseConfiguration $_database_configuration;

	private function __construct() {
		//load all the configurations
		$this->load();
	}

	/**
	 * Get the RI singleton
	 *
	 * @static
	 * @return    Configuration
	 */
	public static function get(): Configuration {
		if (is_null(self::$_instance))
			self::$_instance = new Configuration();

		return self::$_instance;
	}

	public function db(): DatabaseConfiguration {
		// Retrieve database configuration
		return $this->_database_configuration;
	}

	public function get_config(string $name) {
		return $this->read_config($name);
	}


	// private section
	private function load() {
		$this->_database_configuration = new DatabaseConfiguration($this->get_config("database"));
	}

	private function read_config($path) {
		return (array)read_json(Constants::CONFIG_PATH . DIRECTORY_SEPARATOR . $path . ".json");
	}

}
