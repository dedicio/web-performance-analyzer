<?php

declare(strict_types=1);

namespace App\Application\UseCases\Pages;

use App\Domain\Page\Page;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Logger;

class CreatePageUseCase extends PagesUseCase
{
    protected function exec(): Response
    {
        $body = $this->request->getBody();

        (new Logger)->info('CreatePageUseCase', [
            'body'=> $body,
        ]);
        $data = $this->request->getParsedBody();

        $page = $this->repository->save($data);

        return $this->respondWithData($page, 201);
    }
}