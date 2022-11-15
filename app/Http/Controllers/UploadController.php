<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $req){
        session()->flash('status', 'Image was Uploadede successful!');
        // $req->file('file')->store('images'); line kaan commentiga saaran fileka wuu upload gareenaa lkn isla file kii hadii mar labaad lasoo upload gareeyo wuu aqbalaa.
        //  marka codeka ka hooseeyo ayaa ka wanaagsan oo celinaayo file hore loo soo upload gareeyy
        $md5Name = md5_file($req->file('file')->getRealPath());
        $guessExtension = $req->file('file')->guessExtension();
        $req->file('file')->storeAs('docs',$md5Name.'.'.$guessExtension,'public');
        return redirect('upload');
    }
}
