<?php

namespace App\Domain\Page;

use App\Domain\Page\Page;

class PageRequest {
    public string $title;
    public string $url;

    public function __construct(
        string $title,
        string $url,
    ) {
        $this->title = $title;
        $this->url = $url;
    }
}