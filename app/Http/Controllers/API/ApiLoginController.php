<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\App;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth ;

class ApiLoginController extends Controller
{
    public function register(Request $request){
        $user= User::create([
            "name" => $request->name , 
            "email" => $request->email , 
            "password" => bcrypt($request->password)
        ]);
        $response = ['user'=> $user] ; 

        return response($response,200);
    }

    public function logout(Request $request) {
        $token = $request->user()->token();
        $token->revoke();
    return response()->json('Successfully logged out');
    }
    
    public function login(Request $request){
        $login_credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
            if(Auth::attempt($login_credentials))
            {
            $user_login_token= auth()->user()->createToken($request->email)->accessToken;
            return response()->json( ['token' => $user_login_token], 200);
        }
        else{
            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }
    }

    /**
     * This method returns authenticated user details
     */
    public function authenticated(){
        return response()->json(['authenticated-user' => auth()->user()], 200);
    }

}