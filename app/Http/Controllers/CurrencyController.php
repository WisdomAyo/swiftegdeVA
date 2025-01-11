<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class CurrencyController extends Controller
{
    protected $countryCurrencyMap = [
        'NG' => 'NGN',
        'US' => 'USD',
        'GB' => 'GBP',
        'EU' => 'EUR',
        // Add more countries and their currencies as needed
    ];

    public function getCurrency()
    {
        $location = Location::get(request()->ip());
        $countryCode = $location->countryCode;
        $currency = $this->countryCurrencyMap[$countryCode] ?? 'NGN'; // Default to USD if country not found

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
            'currency' => 'required|in:NGN,USD,GBP,EUR', // Add more currencies as needed
        ]);

        session(['currency' => $request->currency]);

        return redirect()->back();
    }
}
