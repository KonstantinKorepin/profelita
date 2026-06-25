<?php

namespace App\Repositories;

use App\Models\Review;
use App\Models\Url;
use App\Repositories\Interfaces\ReviewRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ReviewRepository implements ReviewRepositoryInterface
{
    /**
     * Отзывы на главную страницу
     * @return Collection
     */
    public function getFrontAll(): Collection
    {
        return Review::query()
            ->select([
                'reviews.review',
                'reviews.name',
                DB::raw('DATE_FORMAT(reviews.date, "%d.%m.%Y") as date'),
                'reviews.rating',
                'masters.last_name',
                'masters.first_name',
                'masters.middle_name',
                'urls.url',
            ])
            ->join('masters', 'reviews.master_id', '=', 'masters.id')
            ->leftJoin('urls', function ($join) {
                $join->on('masters.id', '=', 'urls.master_id')
                    ->where('urls.entity_class', '=', Url::MASTER);
            })
            ->where('reviews.on_front', true)
            ->orderByDesc('reviews.date')
            ->get();
    }

    /**
     * Отзывы с пагинацией
     * @param int $numberPerPage
     * @return LengthAwarePaginator
     */
    public function getAllPaginate(int $numberPerPage): LengthAwarePaginator
    {
        return Review::query()
            ->select([
                'reviews.review',
                'reviews.name',
                DB::raw('DATE_FORMAT(reviews.date, "%d.%m.%Y") as date'),
                'reviews.rating',
                'masters.last_name',
                'masters.first_name',
                'masters.middle_name',
                'urls.url',
            ])
            ->join('masters', 'reviews.master_id', '=', 'masters.id')
            ->leftJoin('urls', function ($join) {
                $join->on('masters.id', '=', 'urls.master_id')
                    ->where('urls.entity_class', '=', Url::MASTER);
            })
            ->orderByDesc('reviews.date')
            ->paginate($numberPerPage);
    }

    /** Отзывы мастера
     * @param int $masterId
     * @param int $numberPerPage
     * @return LengthAwarePaginator
     */
    public function getAllByMasterPaginate(int $masterId, int $numberPerPage): LengthAwarePaginator
    {
        return Review::query()
            ->select([
                'reviews.review',
                'reviews.name',
                'reviews.rating',
                DB::raw('DATE_FORMAT(reviews.date, "%d.%m.%Y") as date'),
            ])
            ->where('reviews.master_id', $masterId)
            ->orderByDesc('reviews.date')
            ->paginate($numberPerPage);
    }
}
