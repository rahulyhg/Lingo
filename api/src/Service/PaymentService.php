<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\PaymentEntity;
use App\Resource\DbResource;

class PaymentService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new PaymentEntity((array) $attributes);
	}

	public function getAllPayment(array $attrs = []) {
		return $this->db->select('*')->from('payment')->where($attrs)->fetchAssoc('id');
	}

	public function getPayment(array $attrs = []) {
		return $this->db->select('*')->from('payment')->where($attrs)->fetch();
	}

	public function postPayment(PaymentEntity $paymentEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$paymentEntity->user_id($user['id']);
		}
		$this->db->insert('payment', $paymentEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putPayment(PaymentEntity $paymentEntity, array $user) {
		$query = $this->db->update('payment', $paymentEntity->assign())->where(['id' => $paymentEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deletePayment(PaymentEntity $paymentEntity, array $user) {
		$query = $this->db->delete('payment')->where(['id' => $paymentEntity->getId()]);
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