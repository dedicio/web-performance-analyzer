<?php

declare(strict_types=1);

namespace App\Domain\Page;

class Page
{
    public int $id;
    public string $title;
    public string $url;
    public \DateTime $createdAt;
    public \DateTime $updatedAt;
    public \DateTime $deletedAt;

    public function __construct(
        ?int $id,
        string $title,
        string $url,
        \DateTime $createdAt,
        \DateTime $updatedAt,
        ?\DateTime $deletedAt
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->url = $url;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }
}