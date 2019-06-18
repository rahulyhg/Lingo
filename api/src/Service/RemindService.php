<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\RemindEntity;
use App\Resource\DbResource;

class RemindService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new RemindEntity((array) $attributes);
	}

	public function getAllRemind(array $attrs = []) {
		return $this->db->select('*')->from('remind')->where($attrs)->fetchAssoc('id');
	}

	public function getRemind(array $attrs = []) {
		return $this->db->select('*')->from('remind')->where($attrs)->fetch();
	}

	public function postRemind(RemindEntity $remindEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$remindEntity->user_id($user['id']);
		}
		$this->db->insert('remind', $remindEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putRemind(RemindEntity $remindEntity, array $user) {
		$query = $this->db->update('remind', $remindEntity->assign())->where(['id' => $remindEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteRemind(RemindEntity $remindEntity, array $user) {
		$query = $this->db->delete('remind')->where(['id' => $remindEntity->getId()]);
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