<?php

use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use App\Application\UseCases\Pages\ListPagesUseCase;
use App\Application\UseCases\Pages\CreatePageUseCase;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response, array $args) {
        $response->getBody()->write('Hello from Slim 4 request handler');
        return $response;
    });

    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->get('/pages', ListPagesUseCase::class);
        $group->get('/pages/{id}', 'App\Domain\Page\PageController:getById');
        $group->post('/pages', CreatePageUseCase::class);
        $group->put('/pages/{id}', 'App\Domain\Page\PageController:update');
        $group->delete('/pages/{id}', 'App\Domain\Page\PageController:delete');
    });
};
