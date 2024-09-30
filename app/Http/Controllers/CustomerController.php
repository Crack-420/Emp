<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Mail\CustomerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    // Display a listing of customers
    public function index()
    {
        // Fetch all customers from the database
        $customers = Customer::all();
        return view('customers.index', compact('customers')); // Pass data to the view
    }

    // Show the form for creating a new customer
    public function create()
    {
        return view('customers.create'); // Return view with form for creating a customer
    }

    // Store a newly created customer in the database
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
        ]);

        // Create a new customer with validated data
      $customer =  Customer::create($request->all());
         // Get the currently logged-in user's email
         $user = Auth::user();
        
         // Send the email to the logged-in user
         Mail::to($user->email)->send(new CustomerMail($customer));
     

        // Redirect back to the customer list with a success message
        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    // Display the specified customer along with their artisans
    public function show(Customer $customer)
    {
        // Eager load artisans associated with the customer
        $customer->load('artisans');
        return view('customers.show', compact('customer')); // Show customer details and artisans
    }

    // Show the form for editing a customer
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer')); // Return view with form for editing
    }

    // Update the specified customer in the database
    public function update(Request $request, Customer $customer)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id, // Exclude current customer from unique validation
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
        ]);

        // Update the customer with validated data
        $customer->update($request->all());

        // Redirect back with a success message
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    // Remove the specified customer from the database
    public function destroy(Customer $customer)
    {
        // Delete the customer
        $customer->delete();

        // Redirect back to the customer list with a success message
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
