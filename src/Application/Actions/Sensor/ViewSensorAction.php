<?php

declare(strict_types=1);

namespace App\Application\Actions\Sensor;

use Psr\Http\Message\ResponseInterface as Response;

class ViewSensorAction extends SensorAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $sensorId = (int) $this->resolveArg('id');var_dump(99999999999);
        $sensor = $this->sensorRepository->findSensorOfId($sensorId);

        $this->logger->info("User of id `${sensorId}` was viewed.");

        return $this->respondWithData($sensor);
    }
}
