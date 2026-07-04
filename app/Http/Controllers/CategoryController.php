<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        // $categories = Category::latest()->get();
        return response()->json(Category::all(), 200);
        // return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return response()->json(['message' => 'Create category form']);
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,category_name',
        ]);

        // Changed variable name to singular '$category' because it's only ONE category
        $category = new Category();
        $category->category_name = $validated['name'];
        $category->description = $request->input('description', ''); // Optional description
        $category->save();

        return response()->json($category, 201);
    }

    /**
     * Display the specified category along with its furniture.
     */
    public function show(Category $category) // Fixed: Changed plural $categories to singular $category
    {
        // Inside 'compact', make sure it matches the new singular variable
        return response()->json($category, 200);
    }

    /**
     * Update the specified category in storage.
     */
    
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return response()->json($category, 200);
    }
    public function edit(Category $category)
    {
        return response()->json($category, 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) // Fixed: Changed plural $categories to singular $category
    {
        // 1. Delete the record
        $category->delete();

        // 2. REDIRECT back to the index page
        return response()->json(['message' => 'Category deleted successfully!'], 200);
    }
}