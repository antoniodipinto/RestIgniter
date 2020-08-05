<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * CodeIgniter Array Helpers
 *
 * @package        CodeIgniter
 * @subpackage    Helpers
 * @category    Helpers
 * @author        EllisLab Dev Team
 * @link        https://codeigniter.com/userguide3/helpers/array_helper.html
 */

// ------------------------------------------------------------------------

if (!function_exists('read_json')) {
	/**
	 * Read json
	 *
	 * Read and convert json files to array
	 *
	 * @param string
	 * @return    array    depends on what the array contains
	 */
	function read_json(string $path) {
		return json_decode(file_get_contents($path));
	}
}

// ------------------------------------------------------------------------

if (!function_exists('is_json')) {
	/**
	 * Check if a given string is a json
	 *
	 * @param string $string
	 *
	 * @return bool
	 */
	function is_json($string) {
		if (!is_null_or_empty($string) && is_string($string)) {
			json_decode($string);

			return (json_last_error() == JSON_ERROR_NONE);
		}

		return false;
	}
}

