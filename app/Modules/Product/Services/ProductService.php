<?php

namespace App\Modules\Product\Services;

use App\Modules\Product\Models\Product;
use App\Modules\Product\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Collection;

class ProductService implements ProductServiceInterface
{

    private ProductRepositoryInterface $productRepository;

    /**
     * ProductService constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param array $ids
     * @param array $column
     * @return Collection
     */
    public function getByIds(array $ids, array $column = ['*']): Collection
    {
        return $this->productRepository->getByIds($ids, $column);
    }

    /**
     * @param int $id
     * @return Product
     */
    public function find(int $id): Product
    {
        return $this->productRepository->find($id);
    }
}
