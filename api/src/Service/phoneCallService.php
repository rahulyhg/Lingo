<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\PhoneCallEntity;
use App\Resource\DbResource;

class PhoneCallService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new PhoneCallEntity($attributes);
	}

	public function getAllPhoneCall(array $attrs = []) {
		return $this->db->select('*')->from('phoneCall')->where($attrs)->fetchAssoc('id');
	}

	public function getPhoneCall(array $roles, array $attrs = []) {
		return $this->db->select('*')->from('phoneCall')->where($attrs)->fetch();
	}

	public function postPhoneCall(PhoneCallEntity $phoneCallEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$phoneCallEntity->user_id($user['id']);
		}
		$this->db->insert('phoneCall', $phoneCallEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putPhoneCall(PhoneCallEntity $phoneCallEntity, array $user) {
		$query = $this->db->update('phoneCall', $phoneCallEntity->assign())->where(['id' => $phoneCallEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deletePhoneCall(PhoneCallEntity $phoneCallEntity, array $user) {
		$query = $this->db->delete('phoneCall')->where(['id' => $phoneCallEntity->getId()]);
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