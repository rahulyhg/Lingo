<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\CityEntity;
use App\Resource\DbResource;

class CityService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new CityEntity((array) $attributes);
	}

	public function getAllCity(array $attrs = []) {
		return $this->db->select('*')->from('city')->where($attrs)->fetchAssoc('id');
	}

	public function getCity(array $attrs = []) {
		return $this->db->select('*')->from('city')->where($attrs)->fetch();
	}

	public function postCity(CityEntity $cityEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$cityEntity->user_id($user['id']);
		}
		$this->db->insert('city', $cityEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putCity(CityEntity $cityEntity, array $user) {
		$query = $this->db->update('city', $cityEntity->assign())->where(['id' => $cityEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteCity(CityEntity $cityEntity, array $user) {
		$query = $this->db->delete('city')->where(['id' => $cityEntity->getId()]);
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