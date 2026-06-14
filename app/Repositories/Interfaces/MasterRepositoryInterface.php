<?php

namespace App\Repositories\Interfaces;

use App\Models\Master;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface MasterRepositoryInterface
{
    public function getFrontAll(): Collection;
    public function getAllPaginate(int $numberPerPage): LengthAwarePaginator;
    public function getOne(int $masterId): Master;
}
