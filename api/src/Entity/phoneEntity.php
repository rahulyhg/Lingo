<?php // Julie automatic generated file
namespace App\Entity;


class PhoneEntity extends BaseEntity {

	const table = "phone";

	public function __construct($attributes) {
		$this->hydrate([
			

		]);
		parent::__construct($attributes);
	}

	public function person_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

	public function number($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

	public function user_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

}