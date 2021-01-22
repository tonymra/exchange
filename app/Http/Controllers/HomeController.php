<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $base_currency = isset($user->base_currency) ? $user->base_currency:"EUR";

        $client = new \GuzzleHttp\Client();

        $request = $client->request('GET', "http://data.fixer.io/api/latest", [
            "query" => [
                "access_key"      => env('FIXERIO_API_KEY', 'default_key'),
                "base"      => $base_currency,
            ],
        ]);

        $response = $request->getBody();

        $currencies = json_decode($response, true);

        return view('home')->with(['currencies'=>$currencies,'base_currency'=>$base_currency]);
    }
}
