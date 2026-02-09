<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public static function index()
    {

            $categories = Category::latest()->get();
            return $categories;

    }

    public function create()
    {
        if (auth()->user()->hasRole(['admin'])) {
            return view('categories.create');
        }
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    public function store(Request $request)
    {
        if (auth()->user()->hasRole(['admin'])) {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:categories,name'
            ]);

            $validated['slug'] = Str::slug($validated['name']);
            $category = Category::create($validated);

            return response()->json($category, 201);
        }
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    public function show(Category $category)
    {
        return response()->json($category->load('products'));
    }

    public function edit(Category $category)
    {
        if (auth()->user()->hasRole(['admin', 'moderator'])) {
            return view('categories.edit', compact('category'));
        }
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    public function update(Request $request, Category $category)
    {
        if (auth()->user()->hasRole(['admin', 'moderator'])) {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:categories,name,' . $category->id
            ]);

            $validated['slug'] = Str::slug($validated['name']);
            $category->update($validated);

            return response()->json($category);
        }
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    public function destroy(Category $category)
    {
        if (auth()->user()->hasRole(['admin'])) {
            if ($category->products()->count() > 0) {
                return response()->json(['error' => 'Cannot delete category with products'], 400);
            }

            $category->delete();
            return response()->json(['message' => 'Category deleted successfully']);
        }
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
