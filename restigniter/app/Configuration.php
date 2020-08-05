<?php


namespace RestIgniter;


use MongoDB\Driver\Session;
use RestIgniter\Models\BaseConfiguration;
use RestIgniter\Models\CookieConfiguration;
use RestIgniter\Models\DatabaseConfiguration;
use RestIgniter\Models\LogConfiguration;
use RestIgniter\Models\MigrationConfiguration;
use RestIgniter\Models\SessionConfiguration;

class Configuration
{

	private static $_instance;

	protected DatabaseConfiguration $_database_configuration;

	protected BaseConfiguration  $_base_configuration;

	protected CookieConfiguration  $_cookie_configuration;

	protected LogConfiguration  $_log_configuration;

	protected MigrationConfiguration  $_migration_configuration;

	protected SessionConfiguration $_session_configuration;

	protected Input $input;

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

	// Retrieve database configuration
	public function db(): DatabaseConfiguration {
		return $this->_database_configuration;
	}

	public function base(): BaseConfiguration{
		return $this->_base_configuration;
	}

	public function cookie(): CookieConfiguration{
		return $this->_cookie_configuration;
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
