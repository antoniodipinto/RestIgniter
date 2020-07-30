<?php


namespace RestIgniter;

class Request
{
	private array $_headers = [];

	private array $_payload = [];

	private string $_ip = "";


	public function __construct(array $params) {
		$this->_headers = isset($params['headers']) ? $params['headers'] : [];
		$this->_ip = $this->get_ip();
	}

	public function ip(): string {
		return $this->_ip;
	}

	public function headers(): array {
		return $this->_headers;
	}


	/**
	 * Validate IP Address
	 *
	 * @param string $ip IP address
	 * @param string $which IP protocol: 'ipv4' or 'ipv6'
	 * @return    bool
	 */
	private function is_valid_ip(string $ip, string $which = ''): bool {
		switch (strtolower($which)) {
			case 'ipv4':
				$which = FILTER_FLAG_IPV4;
				break;
			case 'ipv6':
				$which = FILTER_FLAG_IPV6;
				break;
			default:
				$which = NULL;
				break;
		}

		return (bool)filter_var($ip, FILTER_VALIDATE_IP, $which);
	}

	private function get_ip(): string {

		$ip = '';

		foreach (['HTTP_X_FORWARDED_FOR', 'HTTP_CLIENT_IP', 'HTTP_X_CLIENT_IP', 'HTTP_X_CLUSTER_CLIENT_IP'] as $key) {
			if (!empty($_SERVER[$key]) && !is_null($_SERVER[$key])) {
				if ($this->is_valid_ip($_SERVER[$key])) {
					$ip = $_SERVER[$key];
					break;
				}
			}
		}
		return $ip;
	}
}
