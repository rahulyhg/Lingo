<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\EducationEntity;
use App\Resource\DbResource;

class EducationService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new EducationEntity($attributes);
	}

	public function getAllEducation(array $attrs = []) {
		return $this->db->select('*')->from('education')->where($attrs)->fetchAssoc('id');
	}

	public function getEducation(array $roles, array $attrs = []) {
		return $this->db->select('*')->from('education')->where($attrs)->fetch();
	}

	public function postEducation(EducationEntity $educationEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$educationEntity->user_id($user['id']);
		}
		$this->db->insert('education', $educationEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putEducation(EducationEntity $educationEntity, array $user) {
		$query = $this->db->update('education', $educationEntity->assign())->where(['id' => $educationEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteEducation(EducationEntity $educationEntity, array $user) {
		$query = $this->db->delete('education')->where(['id' => $educationEntity->getId()]);
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