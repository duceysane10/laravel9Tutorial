<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;

class addmember extends Controller
{
          // function ka hoose wuxuu xogta ka qabanaa formka ku jira produc.blade.php kedibna wuu soo bandhigaa  
          public function Add(Request $req){
            // adding validation
             $req->input('username');
              //$req->session()->flash('username',$data); this line its not workin on larevel 9 use code bellow
             session()->flash('status', 'Task was successful!');
              return  redirect('addm');
        }

        /// ading member to the data base function
        public function addmember(Request $req){
          $req->validate(
            [   'name'=> 'required | max:20',
                'email' => 'required ',
                'address' => 'required '
            
          ]);
          $member= new member();
          $member->name=$req->name;
          $member->email=$req->email;
          $member->address=$req->address;
          $member->save();
          session()->flash('status', 'successfuly added member !');
          return  view('addmember');
        }
}
