<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addmember extends Controller
{
          // function ka hoose wuxuu xogta ka qabanaa formka ku jira produc.blade.php kedibna wuu soo bandhigaa  
          public function Add(Request $req){
            // adding validation
        $req->input('username');
        //    $req->session()->flash('username',$data); this line its not workin on larevel 9 use code bellow
             session()->flash('status', 'Task was successful!');
            return  redirect('addm');
        }
}
