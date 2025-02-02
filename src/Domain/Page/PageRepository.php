<?php

namespace App\Domain\Page;

use App\Domain\Page\Page;

interface PageRepository
{
    /**
     * @return Page[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Page
     */
    public function findPageById(int $id): Page;

    /**
     * @param Page $page
     * @return void
     */
    public function save(Page $page): void;

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}