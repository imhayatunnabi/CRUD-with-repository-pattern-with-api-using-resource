<?php

namespace App\Repositories;

use App\Models\Product;

interface ProductRepository
{
    public function all(): array;
    public function find(int $id): ?Product;
    public function create(array $data): Product;
    public function update(int $id, array $data): Product;
    public function delete(int $id): bool;
}