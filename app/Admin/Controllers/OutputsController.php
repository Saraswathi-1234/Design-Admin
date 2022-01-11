<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

class OutputsController extends Controller
{
    public function index(){

        return Admin::content(function (Content $content) {

            $content->header('App\Outputs');
            $content->description('List');

            // get data

            $DP0_url = 'https://www.mockachino.com/2b38a0b9-71fd-41//models?name=DP0';
            $DP1_url = 'https://www.mockachino.com/2b38a0b9-71fd-41//models?name=DP1';

            $DP0_outputs = $this->Models_Data($DP0_url);
            $DP1_outputs = $this->Models_Data($DP1_url);

            $data = array(
                'DP0_outputs' => $DP0_outputs,
                'DP1_outputs' => $DP1_outputs
            ); 

            // table

            $content->body(view('pages.outputs',$data));
        });

    }

    public function Models_Data($url){

        $curl = curl_init($url);

        $options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER         => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
            CURLOPT_ENCODING       => "",     // handle compressed
            CURLOPT_USERAGENT      => "test", // name of client
            CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
            CURLOPT_TIMEOUT        => 120,    // time-out on response
        ); 

        curl_setopt_array($curl, $options);
    
        $response  = json_decode(curl_exec($curl));

        // dd($response->id);
    
        curl_close($curl);


        return $response->outputs;

    }
}
