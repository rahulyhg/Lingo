<?php
namespace App\Service;

use \Firebase\JWT\JWT;

class LoginService extends BaseService {

	const JWT_KEY = 'your-256-bit-secret';

	public static $instance = null;

	private $userService = null;
	private $userAuthService = null;
	private $personService = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		parent::__construct();
		$this->userAuthService = UserAuthService::create();
		$this->personService = PersonService::create();
		$this->phoneService = PhoneService::create();
		$this->emailService = EmailService::create();
	}


	public function postLogin($username, $password) {
		$userRow = $this->db->select('*')->from('user')->where(['username' => $username])->fetch();
		if (!$userRow) {
			return null;
		}
		if (!password_verify($password, $userRow['password'])) {
			return null;
		}
		$user = [
			'id' => $userRow['id'],
			'role' => $userRow['role']
		];
		$authToken = JWT::encode($user, self::JWT_KEY);
		return [ 
			'authToken' => $authToken,
			'user' => $user,
			'persons' => $this->personService->getAllPerson(),
			'phones' => $this->phoneService->getAllPhone(),
			'emails' => $this->emailService->getAllEmail(),
		];
	}

}