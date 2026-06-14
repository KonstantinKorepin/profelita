<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ReviewRepositoryInterface
{
    public function getFrontAll(): Collection;
    public function getAll(): Collection;
    public function getAllPaginate(int $numberPerPage): LengthAwarePaginator;
    public function getAllByMasterPaginate(int $masterId, int $numberPerPage): LengthAwarePaginator;
}
