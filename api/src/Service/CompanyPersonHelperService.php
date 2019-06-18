<?php
namespace App\Service;

use App\Entity\CompanyEntity;
use App\Resource\DbResource;

class CompanyPersonHelperService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		$this->companyPersonService = CompanyPersonService::create();
		$this->personService = PersonService::create();
	}

	public function postCompanyPerson($user_id, $company_id) {
		$personEntity = $this->personService->newEntity([]);
		$person_id = $this->personService->postPerson($personEntity, [ 'id' => $user_id ]);
		$companyPersonEntity = $this->companyPersonService->newEntity(['company_id' => $company_id, 'person_id' => $person_id], ['id' => $user_id]);
		$company_person_id = $this->companyPersonService->postCompanyPerson($companyPersonEntity, ['id' => $user_id]);
		return [ 'person_id' => $person_id, 'company_person_id' => $company_person_id ];
	}
}