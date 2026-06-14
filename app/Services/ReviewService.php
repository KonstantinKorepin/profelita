<?php

namespace App\Services;

use App\Repositories\Interfaces\ReviewRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ReviewService
{
    const NUMBER_PER_PAGE = 10;
    const NUMBER_MASTER_REVIEWS_PER_PAGE = 30;

    public function __construct(private ReviewRepositoryInterface $repository)
    {}

    /**
     * Отзывы на странице города.
     * @return Collection
     */
    public function getFrontReviews(): Collection
    {
        return $this->repository->getFrontAll();
    }

    /**
     * Все отзывы.
     * @return Collection
     */
    public function getAllReviews(): Collection
    {
        return $this->repository->getAll();
    }

    /** Все отзывы с пагинацией.
     * @return LengthAwarePaginator
     */
    public function getAllReviewsPaginate(): LengthAwarePaginator
    {
        return $this->repository->getAllPaginate(self::NUMBER_PER_PAGE);
    }

    /**
     * Все отзывы мастера с пагинацией.
     * @param int $masterId
     * @return LengthAwarePaginator
     */
    public function getAllReviewsByMasterPaginate(int $masterId): LengthAwarePaginator
    {
        return $this->repository->getAllByMasterPaginate($masterId, self::NUMBER_MASTER_REVIEWS_PER_PAGE);
    }
}
