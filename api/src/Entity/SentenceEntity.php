<?php // Julie automatic generated file
namespace App\Entity;


class SentenceEntity extends BaseEntity {

	const table = "sentence";

	public function __construct($attributes) {
		$this->hydrate([
			
			

		]);
		parent::__construct($attributes);
	}

	public function book_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

	public function user_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

	public function translation($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

	public function note($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

}