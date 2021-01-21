<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminExchangeController extends Controller
{
    public function base_currency(){

        $fixerio = app(\Ranium\LaravelFixerio\Client::class);

        $currencies = $fixerio->latest();

        return view('base_currency')->with('currencies',$currencies);
    }
}
