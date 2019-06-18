<?php
namespace App\Resource;

use \App\Entity\UserEntity;
use \Firebase\JWT\JWT;

class UserAuthResource {
	
	public static $instance = null;

	private $key = 'your-256-bit-secret';

	public static function create() {
		if (!self::$instance) {
			self::$instance =  new self();
		}
		return self::$instance;
	}

	public function getAuthToken(UserEntity $userEntity) {
		return JWT::encode($userEntity->getToken(), $this->key);
	}

}