<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
        Favorite::with(['customer', 'furniture'])->get(),
        200
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customer,id',
            'furniture_id' => 'required|exists:furniture,id',
        ]);

        $favorite = Favorite::create($validated);

        return response()->json([
            'message' => 'Favorite added successfully.',
            'data' => $favorite
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $favorite = Favorite::with(['customer', 'furniture'])->find($id);

        if (!$favorite) {
            return response()->json([
                'message' => 'Favorite not found.'
            ], 404);
        }

        return response()->json($favorite, 200);
    }

    
    public function destroy(string $id)
    {
        $favorite = Favorite::find($id);

        if (!$favorite) {
            return response()->json([
                'message' => 'Favorite not found.'
            ], 404);
        }

        $favorite->delete();

        return response()->json([
            'message' => 'Favorite removed successfully.'
        ]);
    }
     public function create()
    {
        //
    }

/**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }


}