<?php

declare(strict_types=1);

use App\Domain\Page\PageRepository;
use App\Infrastructure\Persistence\Page\MySqlPageRepository;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        PageRepository::class => function(ContainerInterface $c) {
            return new MySqlPageRepository($c->get(PDO::class));
        }
    ]);
};
