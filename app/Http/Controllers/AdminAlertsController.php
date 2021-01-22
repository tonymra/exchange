<?php

namespace App\Http\Controllers;

use App\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAlertsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alerts = Alert::all();

        return view('alerts_index')->with('alerts',$alerts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new \GuzzleHttp\Client();

        $request = $client->request('GET', "http://data.fixer.io/api/symbols",  [
            "query" => [
                "access_key"      => env('FIXERIO_API_KEY', 'default_key'),
            ],
        ]);

        $response = $request->getBody();

        $currencies = json_decode($response,true);

        return view('alert_create')->with('currencies',$currencies);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'currency' => 'required|max:255',
            'minimum' => 'required|max:255',
        ]);

        $alert = new Alert;
        $alert->user_id = Auth::user()->id;
        $alert->currency = $request->currency;
        $alert->minimum = $request->minimum;
        $alert->save();

        Session::flash('created_alert', 'The alert has been added !');

        return redirect('/alerts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $alert = Alert::whereId($id)->first();

        $client = new \GuzzleHttp\Client();

        $request = $client->request('GET', "http://data.fixer.io/api/symbols",  [
            "query" => [
                "access_key"      => env('FIXERIO_API_KEY', 'default_key'),
            ],
        ]);

        $response = $request->getBody();

        $currencies = json_decode($response,true);

        return view('alert_edit')->with(['currencies'=>$currencies,'alert'=>$alert]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'currency' => 'required|max:255',
            'minimum' => 'required|max:255',
        ]);


        $alert = Alert::whereId($id)->first();

        $alert->currency = $request->currency;
        $alert->minimum = $request->minimum;
        $alert->save();

        Session::flash('updated_alert', 'The alert has been updated !');

        return redirect('/alerts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alert = Alert::whereId($id)->first();

        $alert->delete();


        Session::flash('deleted_alert', 'The alert has been deleted !');

        return redirect('/alerts');

    }
}
