<?php

namespace App\Console\Commands;

use App\Alert;
use Illuminate\Console\Command;

class ExchangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ExchangeRate:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'An alert for exchange rates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $alerts = Alert::all();

        if(count($alerts)>0)
        {

            foreach($alerts as $alert)
            {


                $base_currency = isset($alert->user->base_currency) ? $alert->user->base_currency:"EUR";

                $client = new \GuzzleHttp\Client();

                $request = $client->request('GET', "http://data.fixer.io/api/latest",  [
                    "query" => [
                        "access_key"      => env('FIXERIO_API_KEY', 'default_key'),
                        "base"      => $base_currency,
                        "symbols"      => $alert->currency,
                    ],
                ]);

                $response = $request->getBody();

                $currencies = json_decode($response,true);

                foreach($currencies['rates'] as $currency => $rate)
                {
                   if($rate < $alert->minimum){

                       //Send email notification

                       $data = [
                           'user_name'=>$alert->user->name,
                           'user_email'=>$alert->user->email,
                           'subject'=>"Alert minimum level for ".$alert->currency,
                           'alert_level'=>$rate,
                           'alert'=>$alert,
                       ];

                       $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);

                       $beautymail->send('emails.alert', $data, function($message) use ($data)
                       {

                           $message
                               ->from('noreply@exchangetoolapp.co.za','Exchange Tool')
                               ->to($data['user_email'])
                               ->subject($data['subject']);
                       });

                   }
                }



            }
        }


        return 0;
    }
}
