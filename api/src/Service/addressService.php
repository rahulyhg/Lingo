<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\AddressEntity;
use App\Resource\DbResource;

class AddressService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new AddressEntity((array) $attributes);
	}

	public function getAllAddress(array $attrs = []) {
		return $this->db->select('*')->from('address')->where($attrs)->fetchAssoc('id');
	}

	public function getAddress(array $attrs = []) {
		return $this->db->select('*')->from('address')->where($attrs)->fetch();
	}

	public function postAddress(AddressEntity $addressEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$addressEntity->user_id($user['id']);
		}
		$this->db->insert('address', $addressEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putAddress(AddressEntity $addressEntity, array $user) {
		$query = $this->db->update('address', $addressEntity->assign())->where(['id' => $addressEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteAddress(AddressEntity $addressEntity, array $user) {
		$query = $this->db->delete('address')->where(['id' => $addressEntity->getId()]);
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