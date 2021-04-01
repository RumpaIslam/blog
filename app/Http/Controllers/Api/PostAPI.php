<?php

namespace App\Http\Controllers\Api;



use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class PostAPI extends Controller

{


    public function get_list_api()
    {
        
        //$categories=Category::all();
        
        $post =Post::all();
        return response()->json(compact('post'),200);
        
    }


    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category'  => 'required',
            'title'     => 'required | min:10 |max:250',
            'image'     => 'required | image',
            'desc'      => 'required | string | min:20 ',
            'status'    => 'required |string',
                  
            
        ]);

        //$credentials = $request->only('name', 'status');

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }
            //dd(Auth::user()->id );


            $photo = $request ->file(key:'image');

              if($photo->isValid()){

                $file_name=rand(11111,999999) . date('ymdhis.') . $photo ->getClientOriginalExtension();

                $photo->storeAs('users', $file_name);

        }


        $post = Post::create([
            'user_id'  => Auth::user()->id,
            'category_id'  => $request->category,
            'title'     => $request->title,
            'image'     => $file_name,
            'desc'      => $request->desc,
            'slug'        => strtolower(str_replace(' ', '-', $request->title)),
            'status'    => $request->status,
            
        ]);

        

        return response()->json("Message:Post Created Successfully",201);
    }




    public function view($id){

        $data=Post::where('id',$id)->first();
        return response()->json(compact('data'),200);
    }

    
    public function update(Request $request,$id){

        $data=Post::where('id',$id)->first();

                    $data->user_id = (Auth::user()->id);
                    $data->title    = $request->title;
                    $data->desc  = $request->desc;
                    $data->status    = $request->status;
                    $data->update();

        return response()->json(compact('data'),200);
    }

    public function delete(Request $request,$id){

        $data=Post::where('id',$id)->first();

               $data->delete();

        return response()->json("deleted Success!");
    }

}
