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
