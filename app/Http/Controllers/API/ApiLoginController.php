<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\App;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\DB;

class ApiLoginController extends Controller
{
    public function register(Request $request){
        // $this->validate($request,[
        //     'name'=>'required',
        //     'email'=>'required|email|unique:users',
        //     'password'=>'required|min:8',
        // ]);
         $data  = $request->input_request ; 
        //  dd($data);
        $user= User::create($data);

        $access_token_example = $user->createToken('PassportExample@Section.io')->access_token;
        //return the access token we generated in the above step
        return response()->json(['token'=>$access_token_example],200);
    }

    public function login(Request $request){
        $login_credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(auth()->attempt($login_credentials)){
            //generate the token for the user
            $user_login_token= auth()->user()->createToken($request->email)->accessToken;
            //now return this token on success login attempt 
            $data = DB::table('users')->where('email' , $request->email)->get();
            $fulldata = ['model' => $request->module_name ,'token' => $user_login_token['token'] ,'login_user_data' => $data ];
            return response()->json($fulldata, 200);
        }
        else{
            //wrong login credentials, return, user not authorised to our system, return error code 401
            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }
    }

    /**
     * This method returns authenticated user details
     */
    public function authenticated(){
        //returns details
        return response()->json(['authenticated-user' => auth()->user()], 200);
    }

}
