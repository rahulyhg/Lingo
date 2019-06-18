<?php // Julie automatic generated file
namespace App\Entity;


class PhoneCallEntity extends BaseEntity {

	const table = "phoneCall";

	public function __construct($attributes) {
		$this->hydrate([
			
			
			

		]);
		parent::__construct($attributes);
	}

	public function user_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

	public function person_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

	public function appointment($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_datetime, false);
	}

	public function reason($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

	public function result($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

}