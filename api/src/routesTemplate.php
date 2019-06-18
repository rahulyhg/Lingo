<?php
namespace ZbynekRybicka;

require __DIR__ . '/../../../../../vendor/autoload.php';

use \Mustache_Engine;

function JulieRoutes($data) {

	$template = '<?php // Julie automatic generated file

use Slim\Http\Request;
use Slim\Http\Response;

$app->add(function (Request $request, Response $response, $next) {
	return $next($request, $response)
		->withHeader("Access-Control-Allow-Origin", "*")
        ->withHeader("Access-Control-Allow-Headers", "X-Requested-With, Content-Type, Accept, Origin, Authorization")
        ->withHeader("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, PATCH, OPTIONS");	
});

{{#routes}}
$url = str_replace("$", "", "{{url}}");
$app->{{method}}($url, function (Request $request, Response $response, array $args) {
	$params = [];
	$header = $request->getHeaders();
	$body = $request->getParsedBody();
{{#args}}
	$params[] = $args["{{.}}"];
{{/args}}
{{#headers}}
	$params[] = $body["{{.}}"];
{{/headers}}
{{#body}}
	$params[] = $body["{{.}}"];
{{/body}}
	try {
		$result = $this->MF->{{service}}Service()->{{serviceMethod}}(...$params);
	    return $response
	    	->withJson($result["data"])
	    	->withStatus($result["status"]);
	} catch (Exception $e) {
		return $response
			->withJson($e->getMessage())
			->withStatus(500);
	}
});
{{/routes}}
';

	$e = new Mustache_Engine();
	file_put_contents( __DIR__ . '/routes.php', $e->render($template, $data));

}

$function = '\ZbynekRybicka\JulieRoutes';
