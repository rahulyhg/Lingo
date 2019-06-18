<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\SentenceEntity;
use App\Resource\DbResource;

class SentenceService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new SentenceEntity((array) $attributes);
	}

	public function getAllSentence(array $attrs = []) {
		return $this->db->select('*')->from('sentence')->where($attrs)->fetchAssoc('id');
	}

	public function getSentence(array $attrs = []) {
		return $this->db->select('*')->from('sentence')->where($attrs)->fetch();
	}

	public function postSentence(SentenceEntity $sentenceEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$sentenceEntity->user_id($user['id']);
		}
		$this->db->insert('sentence', $sentenceEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putSentence(SentenceEntity $sentenceEntity, array $user) {
		$query = $this->db->update('sentence', $sentenceEntity->assign())->where(['id' => $sentenceEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteSentence(SentenceEntity $sentenceEntity, array $user) {
		$query = $this->db->delete('sentence')->where(['id' => $sentenceEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteSentenceBy(array $attrs, array $user) {
		$query = $this->db->delete('sentence')->where($attrs);
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