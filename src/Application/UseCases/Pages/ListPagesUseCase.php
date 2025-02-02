<?php

declare(strict_types=1);

namespace App\Application\UseCases\Pages;

use Psr\Http\Message\ResponseInterface as Response;

class ListPagesUseCase extends PagesUseCase
{
    protected function exec(): Response
    {
        $pages = $this->repository->findAll();

        return $this->respondWithData($pages);
    }
}