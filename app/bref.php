<?php

use Bref\Bridge\Slim\SlimAdapter;

require __DIR__.'/vendor/autoload.php';

define('API_VERSION', 'latest');

$slim = new Slim\App;

$slim->get(ApiPath(), function ($request, $response) {
    $response->getBody()->write('Hello world');
    return $response;
});

$slim->get(ApiPath('dev'), function ($request, $response) {
    $response->getBody()->write('Hello world Dev!');
    return $response;
});

$app = new \Bref\Application;
$app->httpHandler(new SlimAdapter($slim));
$app->run();

function ApiPath($path = '')
{
    return sprintf('/%s/%s', API_VERSION, $path);
}