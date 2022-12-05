<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Sensor;

use App\Domain\Sensor\Sensor;
use App\Domain\Sensor\SensorRepositoryInterface;

class SensorRepository extends Sensor implements SensorRepositoryInterface
{
}
