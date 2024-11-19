<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        return response()->json([
            'message' => 'All customers',
            'customers' => $customers,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:drivers,email',
            'phone_number' => 'required|string|max:15|regex:/^\+?[0-9\-]+$/',
            'address' => 'required|string|max:255',
            'driver_license_number' => 'required|string|unique:drivers,driver_license_number|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $customer = Customer::create($validated);

        return response()->json([
            'message' => 'customer created successfully!',
            'new customer' => $customer,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);

        return response()->json([
            'message' => 'show customer',
            'customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone_number' => 'required|string|max:15|regex:/^\+?[0-9\-]+$/',
            'address' => 'required|string|max:255',
            'driver_license_number' => 'required|string|unique:customers,driver_license_number|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $customer = Customer::findOrFail($id);
        $customer->update($validated);

        return response()->json([
            'message' => 'customer updated successfully',
            'updated customer data' => $customer,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return response()->json([
            'message' => 'customer deleted succesffuly',
            'This is the customer deleted' => $customer,
        ]);
    }
}
