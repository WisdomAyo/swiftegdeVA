<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Stevebauman\Location\Facades\Location;
use App\Models\CurrencyRate;
use Illuminate\Support\Facades\Session;

class CurrencyComposer
{
    protected $countryCurrencyMap = [
        'US' => 'USD',
        'NG' => 'NGN',
        'GB' => 'GBP',
        'EU' => 'EUR',
        // Add more countries and their currencies as needed
    ];

    protected $currencySymbols = [
        'USD' => '$',
        'NGN' => '₦',
        'GBP' => '£',
        'EUR' => '€',
        // Add more currencies as needed
    ];

    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('LOCATION_API_KEY');
    }

    public function get_geolocation($apiKey, $ip, $lang = "en", $fields = "*", $excludes = "")
    {
        $url = "https://api.ipgeolocation.io/ipgeo?apiKey=".$apiKey."&ip=".$ip."&lang=".$lang."&fields=".$fields."&excludes=".$excludes;
        $cURL = curl_init();

        curl_setopt($cURL, CURLOPT_URL, $url);
        curl_setopt($cURL, CURLOPT_HTTPGET, true);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json',
            'User-Agent: '.$_SERVER['HTTP_USER_AGENT']
        ));

        $response = curl_exec($cURL);
        curl_close($cURL);

        return $response;
    }

    public function compose(View $view)
    {
        // Check if location data is already in the session
        if (!Session::has('location')) {
            $ip = request()->ip(); // Get client IP address
            $locationJson = $this->get_geolocation($this->apiKey, $ip);
            $decodedLocation = json_decode($locationJson, true);

            if ($decodedLocation && isset($decodedLocation['country_code2'])) {
                $countryCode = $decodedLocation['country_code2'];
                Session::put('location', $countryCode);
            } else {
                $countryCode = 'US'; // Default to US if location not found
                Session::put('location', $countryCode);
            }
        } else {
            // Get country code from session
            $countryCode = Session::get('location');
        }

        $currency = session('currency', $this->countryCurrencyMap[$countryCode] ?? 'USD');

        // Fetch conversion rates from the database
        $conversionRates = CurrencyRate::pluck('conversion_rate', 'currency_code')->toArray();

        $view->with('currency', $currency)
             ->with('currencySymbols', $this->currencySymbols)
             ->with('conversionRates', $conversionRates);
    }
}