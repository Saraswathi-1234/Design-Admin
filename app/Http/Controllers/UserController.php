<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\DE_Users;


class UserController extends Controller
{

    protected $users;

    public function  __construct( DE_Users $usersModel){

        $this->users = $usersModel;

    }

    public function addUsers(Request $request){
        $input = $request->all();

        $validator =  Validator::make($input,[
            'name' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()){
            // echo $validator->errors();
            return;
            // return $this->sendError($validator->errors());
        }

        $user_exist = $this->users->where('email','=', $input['email'])->first();

        if (is_null($user_exist)) {

            $data = array(
                'name' => $input['name'],
                'email' => $input['email'],
            );

            $result = $this->users->create($data);

            if($result){
                return response()->json(['success' => true, 'message' => 'User details added successfully.']);
            }

            return response()->json(['success' => false, 'message' => 'User details cannot be added.']);
        }

        return response()->json(['success' => false, 'message' => 'User details already exist.']);
    }

    public function getUsers(){

        $result = DE_Users::get();

        if($result){
            return response()->json(['success' => true, 'data' => $result ]);
        }

        return response()->json(['success' => false, 'message' => 'Cannot get users.']);
    }
}
