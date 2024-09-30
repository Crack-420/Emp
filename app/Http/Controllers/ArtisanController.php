<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\Customer;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    // Display a listing of artisans
    public function index()
    {
        // Fetch all artisans from the database
        $artisans = Artisan::with('customer')->get(); // Eager load customer relationship
        return view('artisans.index', compact('artisans'));
    }

    // Show the form for creating a new artisan
    public function create()
    {
        // Fetch all customers to assign to artisans
        $customers = Customer::all();
        return view('artisans.create', compact('customers'));
    }

    // Store a newly created artisan in the database
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:artisans,email',
            'phone' => 'required|string|max:20',
            'skill' => 'required|string|max:255',
            'customer_id' => 'required|exists:customers,id', // Ensure the customer exists
        ]);

        // Create a new artisan with validated data
        Artisan::create($request->all());

        // Redirect back with a success message
        return redirect()->route('artisans.index')->with('success', 'Artisan created successfully!');
    }

    // Display the specified artisan
    public function show(Artisan $artisan)
    {
        return view('artisans.show', compact('artisan')); // Show artisan details
    }

    // Show the form for editing an artisan
    public function edit(Artisan $artisan)
    {
        // Fetch all customers for the artisan to be reassigned if needed
        $customers = Customer::all();
        return view('artisans.edit', compact('artisan', 'customers'));
    }

    // Update the specified artisan in the database
    public function update(Request $request, Artisan $artisan)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:artisans,email,' . $artisan->id, // Exclude current artisan from unique validation
            'phone' => 'required|string|max:20',
            'skill' => 'required|string|max:255',
            'customer_id' => 'required|exists:customers,id', // Ensure the customer exists
        ]);

        // Update the artisan with validated data
        $artisan->update($request->all());

        // Redirect back with a success message
        return redirect()->route('artisans.index')->with('success', 'Artisan updated successfully!');
    }

    // Remove the specified artisan from the database
    public function destroy(Artisan $artisan)
    {
        // Delete the artisan
        $artisan->delete();

        // Redirect back with a success message
        return redirect()->route('artisans.index')->with('success', 'Artisan deleted successfully!');
    }
}
