<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\CompanyEntity;
use App\Resource\DbResource;

class CompanyService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new CompanyEntity($attributes);
	}

	public function getAllCompany(array $attrs = []) {
		return $this->db->select('*')->from('company')->where($attrs)->fetchAssoc('id');
	}

	public function getCompany(array $roles, array $attrs = []) {
		return $this->db->select('*')->from('company')->where($attrs)->fetch();
	}

	public function postCompany(CompanyEntity $companyEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$companyEntity->user_id($user['id']);
		}
		$this->db->insert('company', $companyEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putCompany(CompanyEntity $companyEntity, array $user) {
		$query = $this->db->update('company', $companyEntity->assign())->where(['id' => $companyEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteCompany(CompanyEntity $companyEntity, array $user) {
		$query = $this->db->delete('company')->where(['id' => $companyEntity->getId()]);
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