<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\PartEntity;
use App\Resource\DbResource;

class PartService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new PartEntity((array) $attributes);
	}

	public function getAllPart(array $attrs = []) {
		return $this->db->select('*')->from('part')->where($attrs)->fetchAssoc('id');
	}

	public function getPart(array $attrs = []) {
		return $this->db->select('*')->from('part')->where($attrs)->fetch();
	}

	public function postPart(PartEntity $partEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$partEntity->user_id($user['id']);
		}
		$this->db->insert('part', $partEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putPart(PartEntity $partEntity, array $user) {
		$query = $this->db->update('part', $partEntity->assign())->where(['id' => $partEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deletePart(PartEntity $partEntity, array $user) {
		$query = $this->db->delete('part')->where(['id' => $partEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deletePartBy(array $attrs, array $user) {
		$query = $this->db->delete('part')->where($attrs);
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