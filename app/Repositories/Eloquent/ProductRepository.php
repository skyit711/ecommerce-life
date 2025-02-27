<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Product::all();
    }

    public function getAllPaginated(int $perPage = 15,array $filters = [])
    {
        $query = Product::with(['categories', 'images']);

        // Filter by categories if provided
        if (isset($filters['category_ids']) && is_array($filters['category_ids'])) {
            $query->whereHas('categories', function ($query) use ($filters) {
                $query->whereIn('categories.id', $filters['category_ids']);
            });
        }

        unset($filters['category_ids']);

        foreach ($filters as $column => $value) {
            if (!empty($value)) {
                $query->where($column, $value);
            }
        }



        return $query->paginate($perPage);
    }

    public function getById($id)
    {
        return Product::findOrFail($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return $product;
    }
}
