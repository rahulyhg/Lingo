<?php // Julie automatic generated file
namespace App\Entity;


class PartEntity extends BaseEntity {

	const table = "part";

	public function __construct($attributes) {
		$this->hydrate([
			
			

		]);
		parent::__construct($attributes);
	}

	public function sentence_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

	public function user_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

	public function original($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

	public function translation($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

}