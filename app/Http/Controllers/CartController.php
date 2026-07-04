<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Cart::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = Cart::create([
            'customer_id' => $request->customer_id,
            'furniture_id' => $request->furniture_id,
            'quantity' => $request->quantity,
        ]);

        return response()->json([
            'message' => 'Cart item created successfully',
            'data' => $cart
        ], 201); 
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Cart::findOrFail($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cart = Cart::findOrFail($id);

        return response()->json($cart->update($request->all()), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::findOrFail($id);

        return response()->json($cart->delete($id), 204);
    }
}
