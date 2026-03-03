<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        $categories = Category::latest()->paginate(15);

        if ($request->expectsJson()) {
            return response()->json($categories);
        }

        return view('admin.categories.index', compact('categories'));
    }

    public function store(CategoryRequest $request): RedirectResponse|JsonResponse
    {
        $category = Category::create($request->validated());

        if ($request->expectsJson()) {
            return response()->json($category, 201);
        }

        return back()->with('success', 'Category created.');
    }

    public function show(Request $request, Category $category): View|JsonResponse
    {
        if ($request->expectsJson()) {
            return response()->json($category->loadCount('products'));
        }

        return view('admin.categories.show', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse|JsonResponse
    {
        $category->update($request->validated());

        if ($request->expectsJson()) {
            return response()->json($category);
        }

        return back()->with('success', 'Category updated.');
    }

    public function destroy(Request $request, Category $category): RedirectResponse|JsonResponse
    {
        $category->delete();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Deleted']);
        }

        return back()->with('success', 'Category deleted.');
    }
}
