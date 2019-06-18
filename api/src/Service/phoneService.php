<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\PhoneEntity;
use App\Resource\DbResource;

class PhoneService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new PhoneEntity((array) $attributes);
	}

	public function getAllPhone(array $attrs = []) {
		return $this->db->select('*')->from('phone')->where($attrs)->fetchAssoc('id');
	}

	public function getPhone(array $attrs = []) {
		return $this->db->select('*')->from('phone')->where($attrs)->fetch();
	}

	public function postPhone(PhoneEntity $phoneEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$phoneEntity->user_id($user['id']);
		}
		$this->db->insert('phone', $phoneEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putPhone(PhoneEntity $phoneEntity, array $user) {
		$query = $this->db->update('phone', $phoneEntity->assign())->where(['id' => $phoneEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deletePhone(PhoneEntity $phoneEntity, array $user) {
		$query = $this->db->delete('phone')->where(['id' => $phoneEntity->getId()]);
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