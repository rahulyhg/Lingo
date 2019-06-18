<?php
namespace App\Service;

class MeetingHelperService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		$this->meetingService = MeetingService::create();
		$this->meetingPersonService = MeetingPersonService::create();
	}

	public function getAllMeeting() {
		$listMeetingRow = $this->meetingService->collectAndAssign($this->meetingService->getAllMeeting());
		$listMeetingPersonRow = $this->meetingPersonService->getAllMeetingPerson();
		foreach ($listMeetingRow as &$meetingRow) {
			$meetingRow['persons'] = [];
		}
		foreach ($listMeetingPersonRow as $meetingPersonRow) {
			$meetingId = $meetingPersonRow['meeting_id'];
			$personId = $meetingPersonRow['person_id'];
			$listMeetingRow[$meetingId]['persons'][] = $personId;
		}
		return $listMeetingRow;
	}

	public function postMeeting($user_id, $begin, $end, $persons) {
		$meetingRow = ['user_id' => $user_id, 'begin' => $begin, 'end' => $end];
		$userRow = [ 'meeting_id' => $meeting_id, 'person_id' => $person_id ];
		$meetingEntity = $this->meetingService->newEntity($meetingRow);
		$meeting_id = $this->meetingService->postMeeting($meetingEntity,  $userRow);
		foreach ($persons as $person_id) {
			$meetingPersonRow = [ 'meeting_id' => $meeting_id, 'person_id' => $person_id ];
			$meetingPersonEntity = $this->meetingPersonService->newEntity($meetingPersonRow);
			$this->meetingPersonService->postMeetingPerson($meetingPersonEntity, $userRow);
		}
		return $meeting_id;
	}

	public function putMeeting($user_id, $meeting_id, $begin, $end, $persons) {
		$meetingRow = ['id' => $meeting_id, 'user_id' => $user_id, 'begin' => $begin, 'end' => $end];
		$userRow = [ 'id' => $user_id, 'role' => 'owner' ];
		$meetingEntity = $this->meetingService->newEntity($meetingRow);
		$this->meetingPersonService->deleteMeetingPersonBy(['meeting_id' => $meeting_id], [ 'role' => 'manager' ]);
		var_dump($meetingEntity->assign());
		$this->meetingService->putMeeting($meetingEntity, $userRow);
		foreach ($persons as $person_id) {
			$meetingPersonRow = [ 'meeting_id' => $meeting_id, 'person_id' => $person_id ];
			$meetingPersonEntity = $this->meetingPersonService->newEntity($meetingPersonRow);
			$this->meetingPersonService->postMeetingPerson($meetingPersonEntity, []);
		}
	}

	public function putMeetingResolve($user_id, $meeting_id, $begin, $end, $persons) {
		$this->putMeeting($user_id, $meeting_id, $begin, $end, $persons);
		$meetingRow = $this->meetingService->getMeeting(['id' => $meeting_id]);
		$meetingEntity = $this->meetingService->newEntity($meetingRow);
		$meetingEntity->resolved(1);
		$meetingEntity->user_id($user_id);
		$this->meetingService->putMeeting($meetingEntity, ['id' => $user_id, 'role' => 'owner']);
	}

}