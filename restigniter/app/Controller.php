<?php

namespace RestIgniter;

class Controller
{
	protected const HTTP_METHOD_GET = "GET";
	protected const HTTP_METHOD_POST = "POST";
	protected const HTTP_METHOD_PUT = "PUT";
	protected const HTTP_METHOD_DELETE = "DELETE";

	private static Controller $_instance;

	protected Loader $load;

	public Request $request;

	public Response $response;

	public Configuration $configuration;

	/**
	 * Class constructor
	 *
	 * @return    void
	 */
	public function __construct() {
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class) {
			$this->$var =& load_class($class);
		}

		$this->load = new Loader();
		$this->load->initialize();

		$this->response = new Response();
		$this->request = new Request([
			'headers' => $_SERVER
		]);

		$this->configuration = Configuration::get();

		self::$_instance = $this;
		log_message('info', 'Controller Class Initialized');
	}

	public function method(string $method = "GET") {}

	/**
	 * Get the RI singleton
	 *
	 * @static
	 * @return    Controller
	 */
	public static function get_instance() {
		if (is_null(self::$_instance))
			self::$_instance = new Controller();

		return self::$_instance;
	}

}
