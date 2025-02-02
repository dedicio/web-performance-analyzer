<?php

declare(strict_types=1);

namespace App\Application\UseCases\Pages;

use App\Application\UseCases\UseCase;
use App\Domain\Page\PageRepository;

abstract class PagesUseCase extends UseCase
{
    protected PageRepository $repository;

    public function __construct(PageRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }
}