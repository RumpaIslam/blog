<?php

namespace App\Http\Controllers\Frontend;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function showRegisterForm()
    {
        return view(view:'frontend.auth.register');
    }


    public function register(Request $request)
    {
        $photo= $request ->file(key:'photo');
        
        $request->validate([

            'name'     => 'required | string',
            'email'    => 'required | email',
            'password' => 'required | min:4 | same:confirm_password',
            // 'photo'    =>  ['required' , 'image']
        ]);


        // $photo    = $request ->file(key:'photo');

        // if($photo->isValid()){

        //     $file_name=rand(11111,999999) . date('ymdhis.') . $photo ->getClientOriginalExtension();

        //     $photo->storeAs('users', $file_name);

        // }
        

        try {
            User:: create([

                'name'     => $request ->name,
                'email'    => $request ->email,
                'password' => bcrypt($request ->password)

            ]);

            session() -> flash('message', 'User registration Successful.');
        } catch (Exception $e) {
            session() -> flash('message', '!!');
        }

        return redirect() -> back();
    }


    public function login(Request $request)
    {
        $data= $request->validate([

            'email'    => 'required | email',
            'password' => 'required'
           
        ]);

        if(auth()-> attempt($data)){

            return "y";


        }
        else{

            return "n";

        }
    }


    public function loginForm()
    {
        return view(view:'frontend.auth.login');
    }


    
}


