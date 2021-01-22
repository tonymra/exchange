<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminExchangeController extends Controller
{
    public function base_currency(){

       $client = new \GuzzleHttp\Client();

        $request = $client->request('GET', "http://data.fixer.io/api/symbols",  [
            "query" => [
                "access_key"      => env('FIXERIO_API_KEY', 'default_key'),
            ],
        ]);

        $response = $request->getBody();

        $currencies = json_decode($response,true);



        return view('base_currency')->with('currencies',$currencies);
    }


    public function base_currency_update(Request $request){

        $request->validate([
            'base_currency' => 'required|max:255',
        ]);

        $user = Auth::user();

        $user->base_currency = $request->base_currency;

        $user->save();

        Session::flash('base_currency_updated', 'The base currency has been successfully updated !');

        return redirect('/home');
    }
}
