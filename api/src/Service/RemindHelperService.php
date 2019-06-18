<?php
namespace App\Service;


class RemindHelperService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		$this->remindService = RemindService::create();
	}

	public function putRemindResolve($user_id, $remind_id) {
		$remindRow = $this->remindService->getRemind(['id' => $remind_id]);
		$remindEntity = $this->remindService->newEntity($remindRow);
		$remindEntity->resolved(1);
		$remindEntity->user_id($user_id);
		$this->remindService->putRemind($remindEntity, ['role' => 'manager']);
		return null;
	}

}