<?php

declare(strict_types=1);

namespace App\Domain\Page;

class Page
{
    public function __construct(
        public ?int $id,
        public string $title,
        public string $url,
        public \DateTime $createdAt,
        public \DateTime $updatedAt,
        public ?\DateTime $deletedAt = null
    ) {}
}