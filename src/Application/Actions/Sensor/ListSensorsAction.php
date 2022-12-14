<?php

declare(strict_types=1);

namespace App\Application\Actions\Sensor;

use App\Application\SubscribeSensor;
use Psr\Http\Message\ResponseInterface as Response;

class ListSensorsAction extends SensorAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $sensors = $this->sensorRepository::all();
        $this->logger->info("Sensors list was viewed.");

        return $this->respondWithData($sensors);
    }
}
