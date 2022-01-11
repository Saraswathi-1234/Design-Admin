<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

use Illuminate\Support\Facades\Http;

class ParametersController extends Controller
{
    public function index(){

        return Admin::content(function (Content $content) {

            $content->header('App\Parametes');
            $content->description('List');

            // get data

            $DP0_url = 'https://www.mockachino.com/2b38a0b9-71fd-41//models?name=DP0';
            $DP1_url = 'https://www.mockachino.com/2b38a0b9-71fd-41//models?name=DP1';


            $DP0_param = $this->Models_Data($DP0_url);
            $DP1_param = $this->Models_Data($DP1_url);

            $data = array(
                'DP0_param' => $DP0_param->Test1->parameters,
                'DP1_param' => $DP1_param->parameters
            ); 

            // table

            $content->body(view('pages.parameters',$data));
        });

    }

    public function Models_Data($url){

        $response = Http::get($url);

        return json_decode($response);

    }

}
