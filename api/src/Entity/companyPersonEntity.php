<?php // Julie automatic generated file
namespace App\Entity;


class CompanyPersonEntity extends BaseEntity {

	const table = "companyPerson";

	public function __construct($attributes) {
		$this->hydrate([

		]);
		parent::__construct($attributes);
	}

	public function company_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

	public function person_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

	public function user_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

}