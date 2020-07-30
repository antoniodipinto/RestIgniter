<?php


namespace RestIgniter;


class Response
{

	/**
	 * Response constructor.
	 */
	public function __construct() {
	}

	//-----------------------------
	// p u b l i c
	//-----------------------------

	public static function set_header(string $key, string $value) {
		header($key . ": " . $value);
	}

	public static function set_content_type(string $type): void {
		self::set_header("Content-Type", $type);
	}

	/**
	 * @description Exits form the standard of error + data and just outputs the response
	 * @param null $params
	 * @return bool
	 */
	public static function raw($params = null) {
		$params = self::_prepare($params);

		return self::_output(null, null, $params);
	}

	/**
	 * @description Exits form the standard of error + data and just outputs the response
	 * @param null $params
	 * @return bool
	 */
	public static function text($params = null) {
	}

	/**
	 * @param $params
	 * @return array|string
	 */
	private static function _prepare($params) {
		if (self::_isJson($params)) {

			return Encoding::toUTF8(json_decode($params));
		}

		return Encoding::toUTF8($params);
	}

	/**
	 * @param $data
	 * @return bool
	 */
	private static function _isJson($data) {
		if (is_string($data)) {
			json_decode($data);

			return (json_last_error() == JSON_ERROR_NONE);
		}

		return false;
	}

	/**
	 * @param $error
	 * @param null $data
	 * @param null $raw
	 * @return bool
	 */
	private static function _output($error, $data = null, $raw = null) {
		self::set_content_type("application/json");

		if (is_null($raw)) {
			echo json_encode(['error' => $error, 'data' => $data], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
		} else {
			echo json_encode($raw, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
		}

		return true;
	}

	/**
	 * @description Data response, when no error is retrieved
	 * @param null $params
	 * @return bool
	 */
	public static function data($params = null) {
		$params = self::_prepare($params);

		return self::_output(null, $params);
	}

	/**
	 * @description Error response
	 * @param null $params
	 * @return bool
	 */
	public static function error($params = null) {
		$params = self::_prepare($params);

		return self::_output($params);
	}

	/**
	 * @description Fatal error response
	 * @param null $params
	 */
	public static function fatalError($params = null) {
		$params = self::_prepare($params);
		self::_output($params);
		die();
	}
	//-----------------------------
	// p r i v a t e
	//-----------------------------

	/**
	 * @description Not authorized method response, also handle the HTTP status
	 */
	public static function unauthorized() {
		header($_SERVER["SERVER_PROTOCOL"] . " 401 Unauthorized");
		self::_output("Invalid Authorization");
		die();
	}

	/**
	 * @description Not authorized http method response, also handle the HTTP status
	 */
	public static function methodNotAllowed() {
		header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed");
		self::_output("Method Not Allowed");
		die();
	}

	/**
	 * @description Not found method response, also handle the HTTP status
	 */
	public static function notFound() {
		header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
		self::_output("Not found");
		die();
	}

	/**
	 * @param $message
	 */
	public static function phpError($message) {
		self::_output($message);
		die();
	}
}
