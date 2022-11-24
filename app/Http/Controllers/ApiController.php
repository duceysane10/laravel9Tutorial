<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /// ading member to the data base Using Post man API
    public function addmember(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $member= new Student();
        $member->name=$req->input('name');
        $member->email=$req->input('email');
        $member->save();
        return response()->json('success fully Added');

      }

      //////////// Showing member to the data base function
         public function show(Request $req){
            $data = Student::find($req->id);
            return response()->json($data);
          }
    // update API
    public function updatemember(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $member = Student::find($req->id);
        $member->name=$req->name;
        $member->email=$req->email;
        $member->save();
        return response()->json('succes fully Updated');
      }
          // update API
    public function deleteemember(Request $req){

        $member = Student::find($req->id);
        $member->delete();
        return response()->json('succes fully Deleted');
      }

      /// Uploading File using Api
      public function upload(Request $req){
        $result = $req->file('file')->store('ApiDoc');
        return ['result'=> $result];
      }

}
