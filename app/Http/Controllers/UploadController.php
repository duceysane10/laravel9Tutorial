<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $req){
        session()->flash('status', 'Image was Uploadede successful!');
        $req->file('file')->store('images');
        return redirect('upload');
    }
}
