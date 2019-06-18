<?php // Julie automatic generated file
namespace App\Entity;


class PaymentEntity extends BaseEntity {

	const table = "payment";

	public function __construct($attributes) {
		$this->hydrate([
			
			

		]);
		parent::__construct($attributes);
	}

	public function person_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

	public function income($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_bool, false);
	}

	public function cost($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_float, false);
	}

	public function user_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

}