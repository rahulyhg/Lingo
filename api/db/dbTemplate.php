<?php
namespace ZbynekRybicka;

require __DIR__ . '/../../../../../vendor/autoload.php';

use \Mustache_Engine;

function JulieDb($data) {

	$template = '-- Julie Automatic generated file
{{#entities}}{{#table}}
CREATE TABLE `{{table}}` (
	`id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT{{#attributes}}, 
	`{{title}}` {{type}} {{nullable}}{{/attributes}}
);

{{/table}}{{/entities}}

{{#relations}}
ALTER TABLE `{{table}}` ADD FOREIGN KEY (`{{column}}`) REFERENCES `{{foreign_table}}` (`id`);
{{/relations}}
';

	$e = new Mustache_Engine();
	$relations = [];
	foreach ($data['entities'] as &$entity) {
		$entity['title'] = strtolower($entity['title']);
		foreach ($entity['attributes'] as &$attribute) {
			switch ($attribute['type']) {
				case 'string':
					$attribute['type'] = 'CHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
					break;

				case 'int':
				case 'float':
					$attribute['type'] = strtoupper($attribute['type']);
					break;

				case 'bool':
					$attribute['type'] = 'TINYINT(1)';
					$attribute['default'] = !!$attribute['default'] ? 1 : 0;
					break;

				case 'id':
					$attribute['type'] = 'INT UNSIGNED';
					$table = $attribute['relation'] ?: str_replace('_id', '', $attribute['title']);
					$relations[] = [ 'table' => $entity['table'], 'column' => $attribute['title'], 'foreign_table' => $table ];
					break;
			}
			$attribute['nullable'] = $attribute['getter'] === "null" ? 'NOT NULL' : 'NULL';
		}
		$data['relations'] = $relations;
	}
	$newDump = $e->render($template, $data);
	file_put_contents(__DIR__ . '/initialDump.sql', $newDump);
}

$function = '\ZbynekRybicka\JulieDb';
