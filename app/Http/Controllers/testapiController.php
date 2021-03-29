<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class testapiController extends Controller
{
    public function getdata(){

        $alluser=User::all();

        return $alluser;




    }
}
