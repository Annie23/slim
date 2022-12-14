<?php

declare(strict_types=1);

namespace App\Application\Actions\Sensor;

use App\Application\Actions\Action;
use App\Domain\Sensor\SensorRepositoryInterface as SensorRepository;
use Psr\Log\LoggerInterface;

abstract class SensorAction extends Action
{
    protected SensorRepository $sensorRepository;

    public function __construct(LoggerInterface $logger, SensorRepository $sensorRepository)
    {
        parent::__construct($logger);
        $this->sensorRepository = $sensorRepository;
    }
}
