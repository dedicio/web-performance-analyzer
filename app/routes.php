<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response, array $args) {
        $response->getBody()->write('Hello from Slim 4 request handler');
        return $response;
    });
};
