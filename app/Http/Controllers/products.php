<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// si aan u isticmaalno Blade waa inaa code hoos ku qoran qeybta kore kusoo import gareeno 
use Illuminate\Support\Facades\Blade;

use function Termwind\render;

class products extends Controller
{
    // public function display(){
    //     $total =20;
    //     return Blade::render(' <h1>{{$totalp}} Tatall Products</h1>',['totalp'=>$total]);
    // }

    // function ka hoose wuxuu xogta ka qabanaa formka ku jira produc.blade.php kedibna wuu soo bandhigaa  
    public function getdata(Request $req){
        // adding validation
        $req->validate(
            [   'username'=> 'required | max:10',
                'password' => 'required | min:8'
            
            ]

        );
        return $req->input();
    }
}
