<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Customer::all(), 200); 
        // for receiving, updating and deleting the records from the database and return 200 status code
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = Customer::create([
        'customer_name' => $request->customer_name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return response()->json([
        'message' => 'Customer created successfully',
        'data' => $customer
    ], 201);

        // return response()->json(Customer::create($request->all()), 201); 
        // after created new record , it successfully return 201 status code
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Customer::findOrFail($id), 200);
        // for showing the specific record from the database and return 200 status code
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);

        return response()->json($customer->update($request->all()), 200);
        // for updating the specific record from the database and return 200 status code
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);

        return response()->json($customer->delete($id), 204); 
        // for deleting the specific record from the database and 
        // return 204 status code (request was successful, but there is nothing to return in the response body.)
    }

    public function favorites()
    {
        return $this->belongsToMany(Furniture::class, 'favorites');
    }
}
