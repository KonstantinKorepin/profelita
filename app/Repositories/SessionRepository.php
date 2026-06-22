<?php

namespace App\Repositories;

use App\Dto\SessionDto;
use App\Models\City;
use App\Models\Master;
use App\Models\Specialization;
use App\Models\Url;
use App\Repositories\Interfaces\SessionRepositoryInterface;

class SessionRepository implements SessionRepositoryInterface
{
    /**
     * @param ?Url $cityUrl
     * @return SessionDto
     */
    public function getDataBySession($cityUrl = null): SessionDto
    {
        $specializationCode = session('specializationCode') ?? Specialization::PLUMBER;
        if ($cityUrl) {
            $city = City::findOrFail($cityUrl->entity_id);
            $master = Master::join('specializations', 'masters.specialization_id', '=', 'specializations.id')
                    ->where('specializations.code', '=', $specializationCode)
                    ->where('masters.city_id', '=', $city->id)
                    ->first();
        } else {
            $cityCode = session('cityCode');
            $city = $cityCode
                ? City::whereCode($cityCode)->firstOrFail()
                : City::whereCode(config('app.main_city_code'))->firstOrFail();
            $master = Master::join('specializations', 'masters.specialization_id', '=', 'specializations.id')
                ->where('specializations.code', '=', $specializationCode)
                ->where('masters.city_id', '=', $city->id)
                ->first();
        }

        $sessionDto = new SessionDto();
        $sessionDto->setCity($city);
        $sessionDto->setMaster($master);
        return $sessionDto;
    }
}
