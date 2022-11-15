<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// markaan isticmaaleeno model si aan database ka ula tacaamulno waxaa waajiba in ay isku magac ahaadaan dabase nameka noqdo jamac model namekana noqdo keli sida db users, model User kedib waa in model ka laga dhex wacaa controller side code ka hoose 
use \App\Models\User;
/// markaan access gareeno Api with anathoter web application waxaan ubaahan nahay inaan import gareeno HTTP /////////
use Illuminate\Support\Facades\Http;


class Users extends Controller
{
    public function welcome($name){
        echo "welcome to Lravel 9 Tutorials   eng". $name;
    }

    /// using Template
    public function viewLoad(){
        $data=["farax","cali","geeseey","duceysane"];
        return view('duco',['users'=>$data]);
    }
    // public function getusers(){
    //     // echo '<h1> From Users </h1>';
    //     return DB::select("select * from users");
    // }

    // geting data from data base using Model 
    public function getusers(){
            // echo '<h1> From Users </h1>';
            return User::all();
        }

    // geting data from API link using Model 
    public function getApi(){
        // echo '<h1> From Users </h1>';
        $users= Http::get('https://reqres.in/api/users?page=1');
        return view('users',['all'=>$users['data']]);
    }

}
