<?php // Julie automatic generated file
namespace App\Service;

use App\Entity\SentenceEntity;
use App\Resource\DbResource;

class SentenceHelperService extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		parent::__construct();
		$this->sentenceService = SentenceService::create();
		$this->partService = PartService::create();
	}

	public function postSentence($user_id, $book_id, $parts_original) {
		$user = ['id' => $user_id];
		$partsOriginalArr = preg_split('/\s+/', $parts_original);
		$sentenceEntity = $this->sentenceService->newEntity([
			'book_id' => $book_id,
			'translation' => $parts_original,
			'note' => ''
		]);
		$this->db->begin();
		$sentenceId = $this->sentenceService->postSentence($sentenceEntity, $user);
		if (!$sentenceId) {
			$this->db->rollback();
			return null;
		}
		$result = [
			'sentence_id' => $sentenceId,
			'parts' => []
		];
		foreach ($partsOriginalArr as $index => $part) {
			$attributes = [
				'original' => $part,
				'translation' => '',
				'sentence_id' => $sentenceId
			];
			$partEntity = $this->partService->newEntity($attributes);
			$partId = $this->partService->postPart($partEntity, $user);
			if (!$partId) {
				$this->db->rollback();
				return null;
			}
		 	$attributes['id'] = $partId;
			$result['parts'][$partId] = $attributes;
		}
		$this->db->commit();
		return $result;
	}

	public function putSentence($user_id, $sentence, $parts) {
		$user = ['id' => $user_id];
		$sentenceEntity = $this->sentenceService->newEntity($sentence);
		$this->db->begin();
		$this->sentenceService->putSentence($sentenceEntity, $user);
		foreach ($parts as $part) {
			$partEntity = $this->partService->newEntity($part);
			$this->partService->putPart($partEntity, $user);
		}
		$this->db->commit();
		return null;
	}

}