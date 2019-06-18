<?php // Julie automatic generated file
namespace App\Entity;


class MeetingPersonEntity extends BaseEntity {

	const table = "meetingPerson";

	public function __construct($attributes) {
		$this->hydrate([

		]);
		parent::__construct($attributes);
	}

	public function meeting_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

	public function person_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

}