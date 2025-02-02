<?php

namespace App\Domain\Page;

use App\Domain\Page\PageRequest;
use App\Domain\Page\PageRepository;
use App\Domain\Page\Page;
use Psr\Http\Message\ResponseInterface as Response;

class PageController {
    private PageRepository $pageRepository;

    protected Response $response;

    public function __construct(PageRepository $pageRepository) {
        $this->pageRepository = $pageRepository;
    }

    public function getAll() {
        $pages = $this->pageRepository->findAll();

        $json = json_encode($pages, JSON_PRETTY_PRINT);
        $this->response->getBody()->write($json);

        return $this->response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
    }

    public function getById(int $id) {
        return $this->pageRepository->findPageById($id);
    }

    public function save(PageRequest $request) {
        $page = new Page(
            null,
            $request->title,
            $request->url,
            new \DateTime(),
            new \DateTime(),
            null
        );
        $this->pageRepository->save($page);
    }

    public function update(int $id, PageRequest $request) {
        $page = $this->pageRepository->findPageById($id);
        $page->title = $request->title;
        $page->url = $request->url;
        $page->updatedAt = new \DateTime();
        $this->pageRepository->save($page);
    }

    public function delete(int $id) {
        $this->pageRepository->delete($id);
    }
}