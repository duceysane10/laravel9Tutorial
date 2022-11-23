<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
use Illuminate\Support\Facades\DB;

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
          session()->flash('save');
          return  redirect('showm');
        }
          /// Showing member to the data base function
          public function showmember(Request $req){
            $data = member::paginate(5);
            return view('addmember',['members'=>$data]);
          }
            /// Showing member to the data base function
            public function deletemember($id){
              $data = member::find($id);
              $data->delete();
              session()->flash('deleteS', 'successfuly Deleted member ');
              return  redirect('showm');
            }
            /// Showing member to the data base function
            public function getmember($id){
              $data = member::find($id);
              return  view('editm',['data'=>$data]);
            }
            /// ading member to the data base function
        public function updatemember(Request $req){
          $req->validate(
            [   'name'=> 'required | max:20',
                'email' => 'required ',
                'address' => 'required '

          ]);
          $member = member::find($req->id);
          $member->name=$req->name;
          $member->email=$req->email;
          $member->address=$req->address;
          $member->save();
          session()->flash('status', 'member was updated !');
          return  redirect('showm');
        }

        // Using Joins
        function joinD(){

          return Db::table('members')->join('company','members.id', "=", 'company.member_id')->where('members.id',13)
          ->get();

        }
    // One To One relation ship
    function oneToOne(){
        return Member::find(5)->getCompany;
    }

    // one To Many relation ship
     function oneTomany(){
        return Member::find(1)->getCompanyMany->where('co_name','habraac');  // iyadoo where condition la raacsiiyay
    }
}
