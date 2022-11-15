<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
        // function ka hoose wuxuu xogta ka qabanaa formka ku jira produc.blade.php kedibna wuu soo bandhigaa  
        public function loginuser(Request $req){
            // adding validation
            $req->validate(
                [   'username'=> 'required | max:10',
                    'password' => 'required | min:8'
                
                ]
    
            );
            $data= $req->input();
            $req->session()->PUT('username',$data['username']);
            return redirect('about');
        }
}
