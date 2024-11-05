<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // Validated

        $validated = $request->validated();

        $validated['slug'] = str($request->validated('name'))->slug();

        $category = Category::create($validated);
        // dd($category);

        if ($category) {
            return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
        }

        return back();

        // Category
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // dd($category);
        return view('admin.categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        if ($validated['name'] != $category->name) {
            $validated['slug'] = str($request->validated('name'))->slug();
        }

        $category->updateOrFail($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->deleteOrFail();

        return redirect()->route('admin.categories.index')->with('success', 'Category Deleted successfully');

    }
}
