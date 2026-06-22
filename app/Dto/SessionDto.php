<?php

namespace App\Dto;

use App\Models\City;
use App\Models\Master;

/**
 * Данные сессии
 */
class SessionDto
{
    private City $city;
    private Master $master;

    public function getCity(): City
    {
        return $this->city;
    }

    public function setCity(City $city): void
    {
        $this->city = $city;
    }

    public function getMaster(): Master
    {
        return $this->master;
    }

    public function setMaster(Master $master): void
    {
        $this->master = $master;
    }
}
