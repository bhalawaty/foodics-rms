<?php

namespace App\Modules\Product\Repositories;

use App\Modules\Product\Models\Product;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface
{

    /**
     * @param array $ids
     * @param array $column
     * @return Collection
     */
    public function getByIds(array $ids, array $column = ['*']): Collection
    {
        return Product::whereIn('id', $ids)->select($column)->get();
    }


    /**
     * @param int $id
     * @return Product
     */
    public function find(int $id): Product
    {
        return Product::findOrFail($id);
    }
}
