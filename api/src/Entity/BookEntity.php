<?php // Julie automatic generated file
namespace App\Entity;


class BookEntity extends BaseEntity {

	const table = "book";

	public function __construct($attributes) {
		$this->hydrate([
			

		]);
		parent::__construct($attributes);
	}

	public function title($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_string, false);
	}

	public function user_id($value = false) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_id, false);
	}

}