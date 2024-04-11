<?php

// Подключение автозагрузки через composer
require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$faker = \Faker\Factory::create();
$faker->seed(1234);

$domains = [];
for ($i = 0; $i < 10; $i++) {
    $domains[] = $faker->domainName;
}

$phones = [];
for ($i = 0; $i < 10; $i++) {
    $phones[] = $faker->phoneNumber;
}


$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('go to the /phones or /domains');
    return $response;
});

// BEGIN (write your solution here)
$app->get('/phones', function (Request $request, Response $response) use ($phones) {
    echo(json_encode($phones));
    return $response
                ->withHeader('Content-Type', 'application/json');
});
$app->get('/domains', function (Request $request, Response $response) use ($domains) {
    $response->getBody()->write(json_encode($domains));
    return $response
                ->withHeader('Content-Type', 'application/json');
});
$app->post('/users', function ($request, $response) {
    return $response->withStatus(302);
});
// END

$app->run();
