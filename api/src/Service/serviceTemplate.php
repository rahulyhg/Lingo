<?php
namespace ZbynekRybicka;

require __DIR__ . '/../../../../../../vendor/autoload.php';

use \Mustache_Engine;

function implodeParams(&$param, &$dependency) {
	list($type, $var) = explode(" ", $param);
	if ($var) {
		$var = "$$var";
		$param = $type . " " . $var;
		$dependency = $type;
	} else {
		$param = "$$type";
		$dependency = null;
	}
}

function JulieService($data) {

	$template = '<?php // Julie automatic generated file
namespace App\\Service;

{{#entityDependencies}}
use App\\Entity\\{{.}};
{{/entityDependencies}}
{{#persistable}}
use App\\Resource\\DbResource;
{{/persistable}}

class {{titleUc}}Service extends BaseService {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance =  new self();
		}
		return self::$instance;
	}

	public function __construct() {
{{#persistable}}
		$this->dbResource = DbResource::create();
{{/persistable}}
{{#dependencies}}
		$this->{{lc}}Service = {{uc}}Service::create();
{{/dependencies}}
	}

{{#persistable}}
	public function findBy(array $params) {
		return $this->dbResource->findBy({{titleUc}}Entity::class, $params);
	}

	public function findAllBy(array $params) {
		return $this->dbResource->findAllBy({{titleUc}}Entity::class, $params);
	}

	public function find(int $id) {
		return $this->dbResource->find({{titleUc}}Entity::class, $id);
	}

	public function insert({{titleUc}}Entity ${{titleLc}}Entity) {
		return $this->dbResource->insert({{titleUc}}Entity::class, ${{title}}Entity);
	}

	public function update({{titleUc}}Entity ${{titleLc}}Entity) {
		return $this->dbResource->update({{titleUc}}Entity::class, ${{title}}Entity);
	}

	public function delete({{titleUc}}Entity ${{titleLc}}Entity) {
		return $this->dbResource->delete({{titleUc}}Entity::class, ${{title}}Entity);
	}

{{/persistable}}
{{#methods}}
	public function {{title}}({{params}}) {
{{#content}}
		{{#variable}}${{variable}} = {{/variable
}}{{#if}}${{condition}} ? $this->{{then.title}}({{then.params}}){{#else}} : $this->{{title}}({{params}}){{/else}}{{/if
}}{{#foreach}}[];
		foreach (${{listVariable}} as $item) ${{variable}}[] = $this->{{method}}($item){{/foreach
}}{{#callMethod}}$this->{{title}}({{params}}){{/callMethod
}}{{#callService}}$this->{{title}}Service->{{method}}({{params}}){{/callService
}}{{#callEntity}}${{title}}Entity->{{method}}({{params}}){{/callEntity
}}{{#expression}}{{{.}}}{{/expression
}}{{#return}}return ${{variable}}{{/return}};
{{/content}}
	}

{{/methods}}

}';

	$e = new Mustache_Engine();
	$dependency = null;
	foreach ($data['services'] as &$service) {
		$service['titleUc'] = ucfirst($service['title']);
		$service['titleLc'] = lcfirst($service['title']);
		$dependencies = [];
		foreach ($service['dependencies'] as $dependency) {
			$dependencies[] = [ 'uc' => ucfirst($dependency), 'lc' => lcfirst($dependency) ];
		}
		$service['dependencies'] = $dependencies;
		$service['entityDependencies'] = [$service['titleUc'] . "Entity" => true];
		foreach ($service['methods'] as &$method) {
			foreach ($method['params'] as &$param) {
				implodeParams($param, $dependency);
				if ($dependency && $dependency !== 'array') {
					$service['entityDependencies'][$dependency] = true;
				}
			}
			$method['params'] = implode(", ", $method['params']);
			foreach ($method['content'] as &$content) {
				if (array_key_exists('if', $content)) {
					foreach ($content['if']['then']['params'] as &$param) {
						implodeParams($param, $dependency);
					}
					$content['if']['then']['params'] = implode(", ", $content['if']['then']['params']);
					if (array_key_exists('else', $content['if'])) {
						foreach ($content['if']['else']['params'] as &$param) {
							implodeParams($param, $dependency);
						}
						$content['if']['else']['params'] = implode(", ", $content['if']['else']['params']);
					}
				}
				if (array_key_exists('callMethod', $content)) {
					foreach ($content['callMethod']['params'] as &$param) {
						implodeParams($param, $dependency);
					}
					$content['callMethod']['params'] = implode(", ", $content['callMethod']['params']);
				}
				if (array_key_exists('callService', $content)) {
					foreach ($content['callService']['params'] as &$param) {
						implodeParams($param, $dependency);
					}
					$content['callService']['params'] = implode(", ", $content['callService']['params']);
				}
				if (array_key_exists('callEntity', $content)) {
					foreach ($content['callEntity']['params'] as &$param) {
						implodeParams($param, $dependency);
					}
					$content['callEntity']['params'] = implode(", ", $content['callEntity']['params']);
				}
			}
		}
		$service['entityDependencies'] = array_keys($service['entityDependencies']);
		file_put_contents( __DIR__ . '/' . ucFirst($service['title']) . 'Service.php', $e->render($template, $service));
	}

}

$function = '\ZbynekRybicka\JulieService';
