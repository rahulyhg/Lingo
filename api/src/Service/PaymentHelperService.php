<?php
namespace App\Service;

class PaymentHelperService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		$this->paymentService = PaymentService::create();
	}

	public function putPaymentsResolve($user_id, $payment_id) {
		$paymentRow = $this->paymentService->getPayment(['id' => $payment_id]);
		$paymentEntity = $this->paymentService->newEntity($paymentRow);
		$paymentEntity->status(1);
		$this->paymentService->putPayment($paymentEntity, ['id' => $user_id, 'role' => 'owner']);
	}

	public function putPaymentsInvalid($user_id, $payment_id) {
		$paymentRow = $this->paymentService->getPayment(['id' => $payment_id]);
		$paymentEntity = $this->paymentService->newEntity($paymentRow);
		$paymentEntity->status(-1);
		$this->paymentService->putPayment($paymentEntity, ['id' => $user_id, 'role' => 'owner']);
	}

}