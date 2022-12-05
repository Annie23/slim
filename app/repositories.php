<?php

declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Domain\Sensor\SensorRepositoryInterface;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use App\Infrastructure\Persistence\Sensor\SensorRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        SensorRepositoryInterface::class => \DI\autowire(SensorRepository::class),
    ]);
};
