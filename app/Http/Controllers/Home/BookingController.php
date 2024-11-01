<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        return view('freelancer_bookings.create');
    }

    // Handle the form submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'business_category' => 'required|string|max:255',
            'number_of_freelancers' => 'required|integer|min:1',
            'budget' => 'required|numeric|min:0',
            'area_of_specialization' => 'required|array', // Validate as array
            'area_of_specialization.*' => 'required|string|max:255', // Validate each skill as a string
            'pay_type' => 'required|in:hour,monthly',
            'min_pay' => 'nullable|numeric|min:0|required_if:pay_type,hour',
            'max_pay' => 'nullable|numeric|min:0|required_if:pay_type,hour',
            'monthly_pay_amount' => 'nullable|numeric|min:0|required_if:pay_type,monthly',
            'location' => 'required|string|max:255',
            'other_details' => 'nullable|string',


        ]);


//dd($validated);
        Booking::create($validated);

        return redirect()->back()->with('success', 'Booking Request Successfully.');
    }
}
