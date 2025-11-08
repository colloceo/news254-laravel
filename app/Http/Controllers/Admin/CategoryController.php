<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('articles')->orderBy('name')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'slug' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'color' => 'required|string|max:7'
        ]);

        Category::create($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $taxonomy)
    {
        return view('admin.categories.edit', ['category' => $taxonomy]);
    }

    public function update(Request $request, Category $taxonomy)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $taxonomy->id,
            'slug' => 'required|string|max:255|unique:categories,slug,' . $taxonomy->id,
            'description' => 'nullable|string',
            'color' => 'required|string|max:7'
        ]);

        $taxonomy->update($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $taxonomy)
    {
        if ($taxonomy->articles()->count() > 0) {
            return redirect()->route('admin.categories.index')->with('error', 'Cannot delete category with articles.');
        }
        
        $taxonomy->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}