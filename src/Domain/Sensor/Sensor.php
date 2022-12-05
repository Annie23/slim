<?php

declare(strict_types=1);

namespace App\Domain\Sensor;

use JsonSerializable;

class Sensor implements JsonSerializable
{
    private int $id;

    private string $face;

    private float $temperature;

    private int $timestamp;

    public function __construct(? int $id,? string $face,? float $temperature, ? int $timestamp)
    {
        $this->id = $id;
        $this->face = $face;
        $this->temperature = $temperature;
        $this->timestamp = $timestamp;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFace(): string
    {
        return $this->face;
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return 999; /*[
            'id' => $this->id,
            'face' => $this->face,
            'temperature' => $this->temperature,
            'timestamp' => date('Y-m-d H:i:s', (int) $this->timestamp),
        ];*/
    }
}
