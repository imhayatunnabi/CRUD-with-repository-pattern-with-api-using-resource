<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();
        return view('backend.pages.product.index', compact('products'));
    }

    public function create()
    {
        return view('backend.pages.product.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $image = null;
        if ($request->hasFile('image')) {
            $image = date('Ymdhsis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads/products', $image);
            $data['image']=$image;
        }
        $product = $this->productRepository->create($data);
        return redirect()->route('backend.product.index');
    }

    public function show(int $id)
    {
        $product = $this->productRepository->find($id);
        return view('backend.pages.product.show', compact('product'));
    }

    public function edit(int $id)
    {
        $product = $this->productRepository->find($id);
        return view('backend.pages.product.edit', compact('product'));
    }

    public function update(ProductRequest $request, int $id)
    {
        $data = $request->all();
        $product = $this->productRepository->find($id);
        $image = $product->image;
        if ($request->hasFile('image')) {
            $image = date('Ymdhsis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads/products', $image);
            $data['image']=$image;
        }
        Storage::disk('public')->delete($product->image);
        $product = $this->productRepository->update($id, $data);
        return redirect()->route('backend.product.index');
    }

    public function destroy(int $id)
    {
        $product = $this->productRepository->find($id);
        Storage::disk('public')->delete($product->image);
        $this->productRepository->delete($id);
        return redirect()->route('backend.product.index');
    }
}