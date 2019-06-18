<?php // Julie automatic generated file
namespace App\Entity;


class MeetingEntity extends BaseEntity {

	const table = "meeting";

	public function __construct($attributes) {
		$this->hydrate([
			
			

		]);
		parent::__construct($attributes);
	}

	public function begin($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_datetime, false);
	}

	public function end($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_datetime, false);
	}

	public function address_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

}