<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        $products = Product::with('category')->latest()->paginate(15);

        if ($request->expectsJson()) {
            return response()->json($products);
        }

        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function store(ProductRequest $request): RedirectResponse|JsonResponse
    {
        $product = Product::create($request->validated());

        if ($request->expectsJson()) {
            return response()->json($product, 201);
        }

        return back()->with('success', 'Product created.');
    }

    public function show(Request $request, Product $product): View|JsonResponse
    {
        $product->load('category');

        if ($request->expectsJson()) {
            return response()->json($product);
        }

        return view('admin.products.show', compact('product'));
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse|JsonResponse
    {
        $product->update($request->validated());

        if ($request->expectsJson()) {
            return response()->json($product);
        }

        return back()->with('success', 'Product updated.');
    }

    public function destroy(Request $request, Product $product): RedirectResponse|JsonResponse
    {
        $product->delete();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Deleted']);
        }

        return back()->with('success', 'Product deleted.');
    }
}
