<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class CurrencyController extends Controller
{
    protected $countryCurrencyMap = [
        'US' => 'USD',
        'NG' => 'NGN',
        'GB' => 'GBP',
        'EU' => 'EUR',
        // Add more countries and their currencies as needed
    ];

    public function getCurrency()
    {
        $location = Location::get(request()->ip());
        $countryCode = $location->countryCode;
        $currency = $this->countryCurrencyMap[$countryCode] ?? 'USD'; // Default to USD if country not found

        return $currency;
    }

    public function showCurrencyForm()
    {
        $currency = session('currency', $this->getCurrency());
        return view('currency', compact('currency'));
    }

    public function changeCurrency(Request $request)
    {
        $request->validate([
            'currency' => 'required|in:USD,NGN,GBP,EUR', // Add more currencies as needed
        ]);

        session(['currency' => $request->currency]);

        return redirect()->back();
    }
}
