<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class APIController extends Controller
{
    public function login (){
        $email = \request('email');
        $password = \request('password');
        // $email = "kevin@gmail.com";
        // $password = "1239423094230";

        // $user = new User();
        // echo "Ini di API Controller";

        $user = User::where('email', '=', $email)->first();
        if (!$user) {
           return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
        }
        if (!Hash::check($password, $user->password)) {
           return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password']);
        }
        return response()->json(['success'=>true,'message'=>'success', 'data' => $user]);
    }

    public function registerMobile (){
        $user = new User();

        $user->name = \request('name');
        $user->email = \request('email');
        $user->password = \request('password');

        $user->save();
        return response()->json(['success'=>true,'message'=>'success', 'data' => $user]);
    }

    
}
