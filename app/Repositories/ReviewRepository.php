<?php

namespace App\Repositories;

use App\Models\Url;
use App\Repositories\Interfaces\ReviewRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ReviewRepository implements ReviewRepositoryInterface
{
    /**
     * Отзывы на странице города.
     * @return Collection
     */
    public function getFrontAll(): Collection
    {
        return DB::table('reviews')
            ->join('masters', 'reviews.master_id', '=', 'masters.id')
            ->leftJoin('urls', function($join) {
                $join->on('masters.id', '=', 'urls.master_id')
                    ->where('urls.entity_class', '=', Url::MASTER);
            })
            ->select(
                'reviews.review', 'reviews.name',
                DB::raw('DATE_FORMAT(reviews.date, "%d.%m.%Y") as date'),
                'reviews.rating', 'masters.last_name', 'masters.first_name', 'masters.middle_name',
                'urls.url'
            )
            ->where(['reviews.on_front' => true])
            ->orderByDesc('reviews.date')
            ->get();
    }

    /**
     * Все отзывы.
     * @return Collection
     */
    public function getAll(): Collection
    {
        return DB::table('reviews')
            ->join('masters', 'reviews.master_id', '=', 'masters.id')
            ->leftJoin('urls', function($join) {
                $join->on('masters.id', '=', 'urls.master_id')
                    ->where('urls.entity_class', '=', Url::MASTER);
            })
            ->select(
                'reviews.review', 'reviews.name',
                DB::raw('DATE_FORMAT(reviews.date, "%d.%m.%Y") as date'),
                'reviews.rating', 'masters.last_name', 'masters.first_name', 'masters.middle_name',
                'urls.url'
            )->orderByDesc('reviews.date')
            ->get();
    }

    /**
     * Все отзывы с пагинацией.
     * @param int $numberPerPage
     * @return LengthAwarePaginator
     */
    public function getAllPaginate(int $numberPerPage): LengthAwarePaginator
    {
        return DB::table('reviews')
            ->join('masters', 'reviews.master_id', '=', 'masters.id')
            ->leftJoin('urls', function($join) {
                $join->on('masters.id', '=', 'urls.master_id')
                    ->where('urls.entity_class', '=', Url::MASTER);
            })
            ->select(
                'reviews.review', 'reviews.name',
                DB::raw('DATE_FORMAT(reviews.date, "%d.%m.%Y") as date'),
                'reviews.rating', 'masters.last_name', 'masters.first_name', 'masters.middle_name',
                'urls.url'
            )
            ->orderByDesc('reviews.date')
            ->paginate($numberPerPage);
    }

    /**
     * Все отзывы мастера с пагинацией.
     * @param int $masterId
     * @param int $numberPerPage
     * @return LengthAwarePaginator
     */
    public function getAllByMasterPaginate(int $masterId, int $numberPerPage): LengthAwarePaginator
    {
        return DB::table('reviews')
            ->select(
                'reviews.review', 'reviews.name', 'reviews.rating',
                DB::raw('DATE_FORMAT(reviews.date, "%d.%m.%Y") as date'),
            )
            ->where('reviews.master_id', '=', $masterId)
            ->orderByDesc('reviews.date')
            ->paginate($numberPerPage);
    }
}
