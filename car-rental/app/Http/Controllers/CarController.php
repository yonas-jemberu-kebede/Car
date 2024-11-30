<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $allCars = Car::get();

        return response()->json([
            'message' => 'all cars to be displayed',
            'cars' => $allCars,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validtedData = $request->validated([
            'location_id' => 'required|exists:locations,id',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:100',
            'year' => 'required|integer|min:1886|max:'.date('Y'),
            'color' => 'required|string|max:50',
            'license_plate' => 'required|string|unique:cars,license_plate|max:20',
            'status' => 'required|in:Available,Rented,Maintenance',
            'rental_price_per_day' => 'required|numeric|min:0',
            'fuel_type' => 'required|in:Petrol,Diesel,Electric',
        ]);
        $newCar = Car::create($validtedData);

        return response()->json([
            'message' => 'new car created',
            'new car' => $newCar,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $singleCar = Car::findOrFail($id);

        return response()->json([
            'message' => 'single car show',
            'car' => $singleCar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:100',
            'year' => 'required|integer|min:1886|max:'.date('Y'),
            'color' => 'required|string|max:50',
            'license_plate' => 'required|string|unique:cars,license_plate|max:20',
            'status' => 'required|in:Available,Rented,Maintenance',
            'rental_price_per_day' => 'required|numeric|min:0',
            'fuel_type' => 'required|in:Petrol,Diesel,Electric',
        ]);

        $car = Car::findOrFail($id);
        $updated = $car->update($validatedData);

        return response()->json([
            'message' => 'car updated',
            'updated car' => $updated,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carToBeDeleted = Car::findOrFail($id);

        $carToBeDeleted->delete();

        return response()->json([
            'message' => 'the record is deleted successfully',
            'the deleted record is' => $carToBeDeleted,
        ]);
    }
}
