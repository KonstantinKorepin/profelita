<?php

namespace App\Repositories;

use App\Models\Master;
use App\Models\Url;
use App\Repositories\Interfaces\MasterRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MasterRepository implements MasterRepositoryInterface
{
    /**
     * Список мастеров для страницы "Мастера".
     * @return Collection
     */
    public function getFrontAll(): Collection
    {
        return Master::join('specializations', 'masters.specialization_id', '=', 'specializations.id')
                        ->join('urls', function($join) {
                            $join->on('masters.id', '=', 'urls.master_id')
                                ->where('urls.entity_class', '=', Url::MASTER);
                        })
                       ->whereOnFront(true)
                       ->get(['masters.list_file_id',
                              'masters.last_name',
                              'masters.first_name',
                              'masters.middle_name',
                              'masters.rating',
                              'specializations.name',
                              'urls.url']);
    }

    /**
     * Все мастера с пагинацией.
     * @param int $numberPerPage
     * @return LengthAwarePaginator
     */
    public function getAllPaginate(int $numberPerPage): LengthAwarePaginator
    {
        return DB::table('masters')
            ->join('specializations', 'masters.specialization_id', '=', 'specializations.id')
            ->join('cities', 'masters.city_id', '=', 'cities.id')
            ->select(
                'masters.*', 'specializations.name as sp_name', 'cities.name as city_name'
            )
            ->orderBy('masters.id')->paginate($numberPerPage);
    }

    /**
     * Мастер
     * @param int $masterId
     * @return Master
     */
    public function getOne(int $masterId): Master
    {
        return Master::whereId($masterId)->get()->first();
    }
}
