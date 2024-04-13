<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Contact extends Controller
{
    public function index(){
        return view('client.contact');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'nullable|email',
            'phone'=>'required|string',
            'description'=>'required',
        ]);

        $contact = new \App\Models\Contact();
        $contact->fill($request->all());
        $contact->status = 1;
        $contact->save();

        return redirect()->route('contact')->with('message','Gửi liên hệ thành công');
    }
}
