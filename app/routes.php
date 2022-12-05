<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use \App\Application\Actions\Sensor\ListSensorsAction;
use \App\Application\Actions\Sensor\ViewSensorAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    //Sensors
    $app->group('/sensors', function (Group $group) {
        $group->get('',  function() {
            $sensors = \App\Models\Sensor::all();

            $sensorsData = [];

            foreach (['south', 'east', 'north', 'west'] as $face) {
                $sensorsData[] = getOneFaceSensors($sensors, $face);
            }

            return $sensorsData;
        });

    //
        $group->get('/{id}', ViewSensorAction::class);
    });
};

function getOneFaceSensors($sensors, $face) {

    $faceSensors = $sensors->where('face', '=', $face);

    $temps = $sensors->pluck('temperature');
    $midTemperature = array_sum($temps)/count($temps);

    $sensorData = [];

    foreach ($faceSensors as $sensor) {

        if ( $sensor->timestamps > (time() - 3600*24)) {
            $sensor['is_removed'] = true;
        }

        if ($sensor->temperatur > ($midTemperature*20)/100) {
            $sensor['damaged'] = true;
        }

        $sensorData[] = $sensor;
    }

    return $sensorData;
}

