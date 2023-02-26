<?php

namespace App\Repositories;

use App\Models\Product;

class EloquentProductRepository implements ProductRepository
{
    public function all(): array
    {
        return Product::all()->toArray();
    }

    public function find(int $id): ?Product
    {
        return Product::find($id);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function update(int $id, array $data): Product
    {
        $product = Product::find($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id): bool
    {
        return Product::destroy($id) > 0;
    }
}