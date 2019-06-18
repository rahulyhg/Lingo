<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\CompanyPersonEntity;
use App\Resource\DbResource;

class CompanyPersonService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new CompanyPersonEntity((array) $attributes);
	}

	public function getAllCompanyPerson(array $attrs = []) {
		return $this->db->select('*')->from('companyPerson')->where($attrs)->fetchAssoc('id');
	}

	public function getCompanyPerson(array $attrs = []) {
		return $this->db->select('*')->from('companyPerson')->where($attrs)->fetch();
	}

	public function postCompanyPerson(CompanyPersonEntity $companyPersonEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$companyPersonEntity->user_id($user['id']);
		}
		$this->db->insert('companyPerson', $companyPersonEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putCompanyPerson(CompanyPersonEntity $companyPersonEntity, array $user) {
		$query = $this->db->update('companyPerson', $companyPersonEntity->assign())->where(['id' => $companyPersonEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteCompanyPerson(CompanyPersonEntity $companyPersonEntity, array $user) {
		$query = $this->db->delete('companyPerson')->where(['id' => $companyPersonEntity->getId()]);
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