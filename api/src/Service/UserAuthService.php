<?php

namespace App\Service;

use \App\Entity\UserEntity;
use \App\Resource\UserAuthResource;

class UserAuthService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance =  new self();
		}
		return self::$instance;
	}

	public function __construct() {
		$this->bookService = BookService::create();
		$this->sentenceService = SentenceService::create();
		$this->partService = PartService::create();
	}

	public function getAuthToken(UserEntity $userEntity) {
		return $this->userAuthResource->getAuthToken($userEntity);
	}

	public function postLogin($username, $password) {
		return [
			'books' => $this->bookService->getAllBook(),
			'sentences' => $this->sentenceService->getAllSentence(),
			'parts' => $this->partService->getAllPart(),
		];
	}

}