<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function about(){
        return view('main.about');
    }
    public function contact(){
        return view('main.contact');
    }
    public function saveMessage(Request $request){
        $formFields=$request->validate([
            "name"=>"required",
            "email"=>"required",
            "message"=>"required"
        ]);
        Message::create($formFields);

        return redirect("/")->with("message","Message Sent To Admin");
    }
}
