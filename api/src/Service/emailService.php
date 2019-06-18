<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\EmailEntity;
use App\Resource\DbResource;

class EmailService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new EmailEntity((array) $attributes);
	}

	public function getAllEmail(array $attrs = []) {
		return $this->db->select('*')->from('email')->where($attrs)->fetchAssoc('id');
	}

	public function getEmail(array $attrs = []) {
		return $this->db->select('*')->from('email')->where($attrs)->fetch();
	}

	public function postEmail(EmailEntity $emailEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$emailEntity->user_id($user['id']);
		}
		$this->db->insert('email', $emailEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putEmail(EmailEntity $emailEntity, array $user) {
		$query = $this->db->update('email', $emailEntity->assign())->where(['id' => $emailEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteEmail(EmailEntity $emailEntity, array $user) {
		$query = $this->db->delete('email')->where(['id' => $emailEntity->getId()]);
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