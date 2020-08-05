<?php


namespace RestIgniter;

class Request
{
	protected Input $_input;

	private array $_headers = [];

	private array $_payload = [];

	private string $_ip = "";


	public function __construct() {
		$this->_input = new Input();
		$this->_headers = $this->_input->request_headers();
		$this->_payload = $this->_input->input_stream();
		$this->_ip = $this->_input->ip_address();
	}

	public function ip(): string {
		return $this->_ip;
	}

	public function input(): Input {
		return $this->_input;
	}

	public function json(string $key = ""): array {
		return $this->_input->json($key);
	}


	public function headers(): array {
		return $this->_headers;
	}

	public function header(string $key) {
		return element($key, $this->_headers, "");
	}
}
