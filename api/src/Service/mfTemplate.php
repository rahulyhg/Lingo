<?php
namespace ZbynekRybicka;

require __DIR__ . '/../../../../../../vendor/autoload.php';

use \Mustache_Engine;

function JulieMF($data) {

	$template = '<?php // Julie automatic generated file
namespace App\Service;

class MF {

	public static $instance = null;

	public static function create() {
		if (!self::$instance) {
			self::$instance =  new self();
		}
		return self::$instance;
	}

{{#services}}
	public function {{title}}Service() {
		return {{title}}Service::create();
	}

{{/services}}

}

';

	$e = new Mustache_Engine();
	file_put_contents( __DIR__ . '/MF.php', $e->render($template, $data));

}

$function = '\ZbynekRybicka\JulieMF';
