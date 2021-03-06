<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function showRegisterForm(){

    return view(view:'frontend.auth.register');

    }


    public function Register(Request $request){
        
        $request->validate([

            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required'
        ]);
    
    }



}


