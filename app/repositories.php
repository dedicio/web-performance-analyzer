<?php

declare(strict_types=1);

use App\Domain\Page\PageRepository;
use App\Infrastructure\Persistence\Page\MySqlPageRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $db = $this->get(PDO::class);

    $containerBuilder->addDefinitions([
        PageRepository::class => \DI\autowire(MySqlPageRepository::class),
    ]);
};