<?php // Julie automatic generated file
namespace App\Entity;


class AddressEntity extends BaseEntity {

	const table = "address";

	public function __construct($attributes) {
		$this->hydrate([
			

		]);
		parent::__construct($attributes);
	}

	public function street($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

	public function city_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

}