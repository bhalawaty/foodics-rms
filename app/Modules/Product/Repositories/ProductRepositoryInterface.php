<?php

namespace App\Modules\Product\Repositories;

use App\Modules\Order\Models\Order;
use App\Modules\Product\Models\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
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
