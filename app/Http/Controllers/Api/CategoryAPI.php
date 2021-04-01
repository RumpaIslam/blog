<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


     use App\Models\User;
     use App\Models\Category;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use JWTAuth;
    use Tymon\JWTAuth\Exceptions\JWTException;



class CategoryAPI extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories|string|max:255',
            'status' => 'required',
                  
            
        ]);

        $credentials = $request->only('name', 'status');

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }
//dd(Auth::user()->id );

        $category = Category::create([
            'user_id' => (Auth::user()->id),
            'slug'    => strtolower(str_replace(' ', '-', $request->name)),
            'name' => $request->get('name'),
            'status' => $request->get('status'),
            
        ]);

        

        return response()->json("Message:Category Created Successfully",201);
    }

    public function view($id){

        $data=Category::where('id',$id)->first();
        return response()->json(compact('data'),200);
    }

    public function update(Request $request,$id){

        $data=Category::where('id',$id)->first();

        $data->user_id = (Auth::user()->id);
                    $data->name    = $request->name;
                    $data->status  = $request->status;
                    $data->slug    = strtolower(str_replace(' ', '-', $request->name));
                    $data->update();

        return response()->json(compact('data'),200);
    }

    public function delete(Request $request,$id){

        $data=Category::where('id',$id)->first();

               $data->delete();

        return response()->json("deleted Success!");
    }



}
