<?php

declare(strict_types=1);

use App\Application\Settings\Settings;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        SettingsInterface::class => function () {
            return new Settings([
                'google_pagespeed_api_key' => getenv('GOOGLE_PAGESPEED_API_KEY'),

                "db" => [
                    "host" => getenv("MARIADB_HOST"),
                    "dbname" => getenv("MARIADB_DATABASE"),
                    "user" => getenv("MARIADB_USER"),
                    "pass" => getenv("MARIADB_PASSWORD"),
                ],
            ]);
        }
    ]);
};
