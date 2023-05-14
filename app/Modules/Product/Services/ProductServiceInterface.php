<?php

namespace App\Modules\Product\Services;

use App\Modules\Product\Models\Product;
use Illuminate\Support\Collection;

interface ProductServiceInterface
{
    /**
     * @param array $ids
     * @param array $column
     * @return Collection
     */
    public function getByIds(array $ids, array $column = ['*']): Collection;

    /**
     * @param int $id
     * @return Product
     */
    public function find(int $id): Product;

}
