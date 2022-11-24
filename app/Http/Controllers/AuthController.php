<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Guid\Fields;

class AuthController extends Controller
{
    public function register(Request $request){
        $fileds = $request->validate([
            'name' => 'required |string',
            'email' => 'required |string |unique:users,email',
            'password' => 'required |string | confirmed'
        ]);
        $user=User::create([
            'name' => $fileds['name'],
            'email' => $fileds['email'],
            'password' => bcrypt($fileds['password'])
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response,201);
    }
    public function login(Request $request){
        $fileds = $request->validate([
            'email' => 'required |string',
            'password' => 'required |string '
        ]);
         // checking if the email exist
        $user= User::where('email',$fileds['email'])->first();
        // checking the password and email matches
        if(!$user || !Hash::check($fileds['password'],$user->password)){
            return response([
                'message: userka iyo passwordk isma match gareenayaan'
            ],401);
        };
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response,201);
    }
    public function logout(Request $request){

        Auth::user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];

    }
}
