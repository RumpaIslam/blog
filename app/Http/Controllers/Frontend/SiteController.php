<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function showRegisterForm(){

    return view(view:'frontend.auth.register');

    }


    public function Register(Request $request){
        
        $request->validate([

            'name'     => 'required | string',
            'email'    => 'required | email',
            'password' => 'required | min:4'
        ]);



        $signup =New User();

            $signup->student_name=$request->name;
            $signup->student_email=$request->email;
            $signup->student_password=md5($request->password);
            $signup->save();
    
    
    
            return back()->with('success', 'User created successfully!!!');
    
    }

   

}


