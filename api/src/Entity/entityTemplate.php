<?php
namespace ZbynekRybicka;

require __DIR__ . '/../../../../../../vendor/autoload.php';

use \Mustache_Engine;

function JulieEntity($data) {

	$template = '<?php // Julie automatic generated file
namespace App\\Entity;

{{#dependencies}}
use App\\Entity\\{{.}};
{{/dependencies}}

class {{title.uc}}Entity extends BaseEntity {

	const table = "{{table}}";

	public function __construct($attributes) {
		parent::__construct($attributes);
		$this->hydrate([
{{#attributes}}
{{#default}}			"{{title}}" => {{{default}}},{{/default}}
{{/attributes}}
		]);
	}

{{#attributes}}
	public function {{title}}($value = {{getter}}) {
		return $this->getOrSet(__FUNCTION__, $value, self::type_{{type}}, {{getter}});
	}

{{/attributes}}
{{#methods}}
	public function {{title}}({{params}}) {
{{#content}}
		{{#variable}}${{.}} = {{/variable}}{{#set}}$this->{{method}}({{params}}){{/set
}}{{#get}}$this->{{method}}({{params}}){{/get
}}{{#if}}${{condition}} ? ${{then}} : ${{else}}{{/if
}}{{#expression}}{{{.}}}{{/expression
}}{{#return}}return ${{variable}}{{/return}};
{{/content}}
	}
{{/methods}}
}
';

	$e = new Mustache_Engine();
	$dependency = null;
	foreach ($data['entities'] as &$entity) {
		$entity['title'] = [ 'uc' => ucfirst($entity['title']), 'lc' => lcfirst($entity['title'])];
		$entity['dependencies'] = [];
		foreach ($entity['methods'] as &$method) {
			foreach ($method['params'] as &$param) {
				implodeParams($param, $dependency);
				if ($dependency && $dependency !== 'array') {
					$entity['dependencies'][$dependency] = true;
				}
			}
			$method['params'] = implode(", ", $method['params']);
			foreach ($method['content'] as &$content) {
				if (array_key_exists('get', $content)) {
					foreach ($content['get']['params'] as &$param) {
						implodeParams($param, $dependency);
					}
					$content['get']['params'] = implode(", ", $content['get']['params']);
				}
				if (array_key_exists('set', $content)) {
					foreach ($content['set']['params'] as &$param) {
						implodeParams($param, $dependency);
					}
					$content['set']['params'] = implode(", ", $content['set']['params']);
				}
			}
		}
		$entity['dependencies'] = array_keys($entity['dependencies']);
		file_put_contents( __DIR__ . '/' . $entity['title']['uc'] . 'Entity.php', $e->render($template, $entity));
	}

}

$function = '\ZbynekRybicka\JulieEntity';
