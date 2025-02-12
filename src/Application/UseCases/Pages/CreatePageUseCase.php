<?php

declare(strict_types=1);

namespace App\Application\UseCases\Pages;

use App\Domain\Page\Page;
use Psr\Http\Message\ResponseInterface as Response;

class CreatePageUseCase extends PagesUseCase
{
    protected function exec(): Response
    {
        $body = $this->request->getBody();
        $data = json_decode((string) $body, true);

        $page = new Page(
            id: null,
            title: $data['title'],
            url: $data['url'],
            createdAt: new \DateTime(),
            updatedAt: new \DateTime()
        );

        $page = $this->repository->save($page);

        return $this->respondWithData($page, 201);
    }
}
