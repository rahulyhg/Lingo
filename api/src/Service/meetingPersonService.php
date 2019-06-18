<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\MeetingPersonEntity;
use App\Resource\DbResource;

class MeetingPersonService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new MeetingPersonEntity((array) $attributes);
	}

	public function getAllMeetingPerson(array $attrs = []) {
		return $this->db->select('*')->from('meetingPerson')->where($attrs)->fetchAssoc('id');
	}

	public function getMeetingPerson(array $attrs = []) {
		return $this->db->select('*')->from('meetingPerson')->where($attrs)->fetch();
	}

	public function postMeetingPerson(MeetingPersonEntity $meetingPersonEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$meetingPersonEntity->user_id($user['id']);
		}
		$this->db->insert('meetingPerson', $meetingPersonEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putMeetingPerson(MeetingPersonEntity $meetingPersonEntity, array $user) {
		$query = $this->db->update('meetingPerson', $meetingPersonEntity->assign())->where(['id' => $meetingPersonEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteMeetingPerson(MeetingPersonEntity $meetingPersonEntity, array $user) {
		$query = $this->db->delete('meetingPerson')->where(['id' => $meetingPersonEntity->getId()]);
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