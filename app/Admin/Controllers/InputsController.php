<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

class InputsController extends Controller
{

    public function index(){

        return Admin::content(function (Content $content) {

            $content->header('App\Inputs');
            $content->description('List');

            // get data

            $DP0_url = 'https://www.mockachino.com/2b38a0b9-71fd-41//models?name=DP0';
            $DP1_url = 'https://www.mockachino.com/2b38a0b9-71fd-41//models?name=DP1';

            $DP0_inputs = $this->Models_Data($DP0_url);
            $DP1_inputs = $this->Models_Data($DP1_url);

            $data = array(
                'DP0_inputs' => $DP0_inputs,
                'DP1_inputs' => $DP1_inputs
            ); 

            // table

            $content->body(view('pages.inputs',$data));
        });

    }

    public function Models_Data($url){

        $curl = curl_init('http://constructionmarket.info/zerosoftzst/easytravel/AppServer/newrestapi/index.php/webtransport/getAllPlaces');

        set_time_limit(0);
        
        $options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER         => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => false,   // follow redirects
            CURLOPT_TIMEOUT        => 36000,    // time-out on response
            CURLOPT_CONNECTTIMEOUT => 36000,    // time-out on connect
        ); 

        curl_setopt_array($curl, $options);
    
        $response  = json_decode(curl_exec($curl));
    
        curl_close($curl);

        dd($response) ;


        return $response->inputs;

    }


}
