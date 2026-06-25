<?php

namespace App\Repositories;

use App\Models\Master;
use App\Models\Url;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\MasterRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MasterRepository implements MasterRepositoryInterface
{
    /**
     * Список мастеров для страницы "Мастера".
     * @return Collection
     */
    public function getFrontAll(): Collection
    {
        return Master::query()
            ->select([
                'masters.list_file_id',
                'masters.last_name',
                'masters.first_name',
                'masters.middle_name',
                'masters.rating',
                'specializations.name',
                'urls.url',
            ])
            ->join('specializations', 'masters.specialization_id', '=', 'specializations.id')
            ->join('urls', function ($join) {
                $join->on('masters.id', '=', 'urls.master_id')
                    ->where('urls.entity_class', '=', Url::MASTER);
            })
            ->whereOnFront(true)
            ->get();
    }

    /**
     * Все мастера с пагинацией.
     * @param int $numberPerPage
     * @return LengthAwarePaginator
     */
    public function getAllPaginate(int $numberPerPage): LengthAwarePaginator
    {
        return Master::query()
            ->select([
                'masters.*',
                'specializations.name as sp_name',
                'cities.name as city_name',
            ])
            ->join('specializations', 'masters.specialization_id', '=', 'specializations.id')
            ->join('cities', 'masters.city_id', '=', 'cities.id')
            ->orderBy('masters.id')
            ->paginate($numberPerPage);
    }

    /**
     * Мастер
     * @param int $masterId
     * @return Master
     */
    public function getOne(int $masterId): Master
    {
        return Master::findOrFail($masterId);
    }
}
