<?php // Julie automatic generated file
namespace App\Entity;


class PersonEntity extends BaseEntity {

	const table = "person";

	public function __construct($attributes) {
		$this->hydrate([
			
			

		]);
		parent::__construct($attributes);
	}

	public function firstname($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

	public function lastname($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

	public function user_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

}