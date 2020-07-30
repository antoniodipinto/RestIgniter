<?php

namespace RestIgniter;

class RestIgniter
{
	private static Configuration $_configuration;

	/**
	 * Class constructor
	 *
	 * @return    void
	 */
	private function __construct() {

	}

	public static function configuration() {
		// check if is null

		return self::$_configuration;
	}

}
