<?php // Julie automatic generated file

use Slim\Http\Request;
use Slim\Http\Response;

$app->add(function (Request $request, Response $response, $next) {
	return $next($request, $response)
		->withHeader("Access-Control-Allow-Origin", "*")
        ->withHeader("Access-Control-Allow-Headers", "X-Requested-With, Content-Type, Accept, Origin, Authorization")
        ->withHeader("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, PATCH, OPTIONS");	
});

$url = str_replace("$", "", "/login");
$app->post($url, function (Request $request, Response $response, array $args) {
	$params = [];
	$header = $request->getHeaders();
	$body = $request->getParsedBody();
	$params[] = $body["username"];
	$params[] = $body["password"];
	try {
		$result = $this->MF->userService()->login(...$params);
	    return $response
	    	->withJson($result["data"])
	    	->withStatus($result["status"]);
	} catch (Exception $e) {
		return $response
			->withJson($e->getMessage())
			->withStatus(500);
	}
});
$url = str_replace("$", "", "/person");
$app->put($url, function (Request $request, Response $response, array $args) {
	$params = [];
	$header = $request->getHeaders();
	$body = $request->getParsedBody();
	$params[] = $body["firstname"];
	$params[] = $body["lastname"];
	$params[] = $body["birth"];
	try {
		$result = $this->MF->personService()->savePersonInfo(...$params);
	    return $response
	    	->withJson($result["data"])
	    	->withStatus($result["status"]);
	} catch (Exception $e) {
		return $response
			->withJson($e->getMessage())
			->withStatus(500);
	}
});
$url = str_replace("$", "", "/users/change-password");
$app->put($url, function (Request $request, Response $response, array $args) {
	$params = [];
	$header = $request->getHeaders();
	$body = $request->getParsedBody();
	$params[] = $body["newPassword"];
	try {
		$result = $this->MF->userService()->changePassword(...$params);
	    return $response
	    	->withJson($result["data"])
	    	->withStatus($result["status"]);
	} catch (Exception $e) {
		return $response
			->withJson($e->getMessage())
			->withStatus(500);
	}
});
