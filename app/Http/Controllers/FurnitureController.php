<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FurnitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load the category relationship for better performance
        // $furniture = Furniture::with('category')->latest()->get();
        
        // Correctly returns the Blade view
        return response()->json(Furniture::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::all();
        // return view('furniture.create', compact('categories'));
        return response()->json(['message' => 'Form for creating furniture would be here.'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $furniture = Furniture::create([
            'category_id'    => $request->category_id,
            'furniture_name' => $request->furniture_name,
            'sku'            => $request->sku,
            'price'          => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'status'         => $request->status,
        ]);
        return response()->json($furniture, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Furniture $furniture)
    {
        // FIX: Return a blade view instead of JSON to match your index/create templates
        return response()->json($furniture, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Furniture $furniture)
    {
        $categories = Category::all();
        return response()->json(['furniture' => $furniture, 'categories' => $categories], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Furniture $furniture)
    {
        $validated = $request->validate([
            'category_id'    => 'sometimes|required|exists:categories,id',
            'furniture_name' => 'sometimes|required|string|max:255',
            'sku'            => ['sometimes', 'required', 'string', 'max:255', Rule::unique('furniture')->ignore($furniture->id)],
            'price'          => 'sometimes|required|numeric|min:0',
            'stock_quantity' => 'sometimes|required|integer|min:0', // FIX: Keep validation rules strict
            'status'         => ['sometimes', 'required', Rule::in(['available', 'out_of_stock', 'discontinued'])],
        ]);

        $furniture->update($validated);

        // FIX: Redirect back to index after updating instead of returning JSON
        return response()->json(['message' => 'Furniture item updated successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Furniture $furniture)
    {
        $furniture->delete();

        // FIX: Redirect back to the index view so the table updates dynamically
        return response()->json(['message' => 'Furniture item deleted successfully!'], 200);
    }
    
    public function favoritedBy()
    {
        return $this->belongsToMany(Customer::class, 'favorites');
    }
}