<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Repositories\ProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();
        return ProductResource::collection($products);
    }

    public function show(int $id)
    {
        $product = $this->productRepository->find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return new ProductResource($product);
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'description', 'price']);
        $product = $this->productRepository->create($data);
        return new ProductResource($product, 201);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->only(['name', 'description', 'price']);
        $product = $this->productRepository->update($id, $data);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return new ProductResource($product);
    }

    public function destroy(int $id)
    {
        $deleted = $this->productRepository->delete($id);

        if (!$deleted) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json(null, 204);
    }
}