<?php // Julie automatic generated file
namespace App\Entity;


class RemindEntity extends BaseEntity {

	const table = "remind";

	public function __construct($attributes) {
		$this->hydrate([
			
			
			"resolved" => false,

		]);
		parent::__construct($attributes);
	}

	public function description($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

	public function person_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

	public function deadline($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_date, false);
	}

	public function resolved($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_bool, false);
	}

	public function user_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

}