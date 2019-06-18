<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\BookEntity;
use App\Resource\DbResource;

class BookService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function newEntity($attributes) {
		return new BookEntity((array) $attributes);
	}

	public function getAllBook(array $attrs = []) {
		return $this->db->select('*')->from('book')->where($attrs)->fetchAssoc('id');
	}

	public function getBook(array $attrs = []) {
		return $this->db->select('*')->from('book')->where($attrs)->fetch();
	}

	public function postBook(BookEntity $bookEntity, array $user) {
		if (array_key_exists('id', $user)) {
			$bookEntity->user_id($user['id']);
		}
		$this->db->insert('book', $bookEntity->assign())->execute();
		return $this->db->getInsertId();
	}

	public function putBook(BookEntity $bookEntity, array $user) {
		$query = $this->db->update('book', $bookEntity->assign())->where(['id' => $bookEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteBook(BookEntity $bookEntity, array $user) {
		$query = $this->db->delete('book')->where(['id' => $bookEntity->getId()]);
		switch ($user['role']) {
			case 'owner':
				$query = $query->where('user_id = %i', $user['id']);
				break;

			case 'manager':
				break;
		}
		$query->execute();
	}

	public function deleteBookBy(array $attrs, array $user) {
		$query = $this->db->delete('book')->where($attrs);
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