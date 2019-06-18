<?php // Julie automatic generated file
namespace App\Entity;


class CityEntity extends BaseEntity {

	const table = "city";

	public function __construct($attributes) {
		$this->hydrate([
			
			

		]);
		parent::__construct($attributes);
	}

	public function zip($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

	public function title($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

}