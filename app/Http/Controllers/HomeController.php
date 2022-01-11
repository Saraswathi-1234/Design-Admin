<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\RegistrationForm;

use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{

    public function index(){
        $curl = curl_init('http://constructionmarket.info/zerosoftzst/easytravel/AppServer/newrestapi/index.php/webtransport/getAllPlaces');

        set_time_limit(0);
        
        $options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER         => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => false,   // follow redirects
            CURLOPT_TIMEOUT        => 0,    // time-out on response
            CURLOPT_CONNECTTIMEOUT => 0,    // time-out on connect
            CURLOPT_CUSTOMREQUEST => "GET",
        ); 

        curl_setopt_array($curl, $options);
    
        $response  = json_decode(curl_exec($curl));
    
        curl_close($curl);

        dd($response) ;
    }

    public function home()
    {
        try {
            \DB::connection()->getPDO();
            echo \DB::connection()->getDatabaseName();

            dd(12);
            } catch (\Exception $e) {
            echo 'None';
            dd($e);
        }
        dd(1234);
    }
   
}
