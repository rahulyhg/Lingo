<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\PersonEntity;
use App\Resource\DbResource;

class PersonService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new PersonEntity((array) $attributes);
	}

	public function getAllPerson(array $attrs = []) {
		return $this->db->select('*')->from('person')->where($attrs)->fetchAssoc('id');
	}

	public function getPerson(array $attrs = []) {
		return $this->db->select('*')->from('person')->where($attrs)->fetch();
	}

	public function postPerson(PersonEntity $personEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$personEntity->user_id($user['id']);
		}
		$this->db->insert('person', $personEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putPerson(PersonEntity $personEntity, array $user) {
		$query = $this->db->update('person', $personEntity->assign())->where(['id' => $personEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deletePerson(PersonEntity $personEntity, array $user) {
		$query = $this->db->delete('person')->where(['id' => $personEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

}