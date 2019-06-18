<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\MeetingEntity;
use App\Resource\DbResource;

class MeetingService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new MeetingEntity((array) $attributes);
	}

	public function getAllMeeting(array $attrs = []) {
		return $this->db->select('*')->from('meeting')->where($attrs)->fetchAssoc('id');
	}

	public function getMeeting(array $attrs = []) {
		return $this->db->select('*')->from('meeting')->where($attrs)->fetch();
	}

	public function postMeeting(MeetingEntity $meetingEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$meetingEntity->user_id($user['id']);
		}
		$this->db->insert('meeting', $meetingEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putMeeting(MeetingEntity $meetingEntity, array $user) {
		$query = $this->db->update('meeting', $meetingEntity->assign())->where(['id' => $meetingEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteMeeting(MeetingEntity $meetingEntity, array $user) {
		$query = $this->db->delete('meeting')->where(['id' => $meetingEntity->getId()]);
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