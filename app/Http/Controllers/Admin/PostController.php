<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderby('id','desc')->SimplePaginate(5);
       
        
        return view ('admin.post.manage',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories=Category::all();
         return view('admin.post.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

       
        $request->validate([

            'category'  => 'required',
            'title'     => 'required | min:10 |max:250',
            'image'     => 'required',
            'desc'      => 'required | string | min:20 ',
            'status'    => 'required |string',


        ]);

        // dd($request);

        try{

            Post::create([

            'user_id'  => auth()->id(),
            'category_id'  => $request->category,
            'title'     => $request->title,
            'image'     => 'image.png',
            'desc'      => $request->desc,
            'slug'        => strtolower(str_replace(' ', '-', $request->title)),
            'status'    => $request->status,
                

            ]);


                
            session()-> flash('type','success');
            session()-> flash('message','Post updated Successfully.');

        }catch(Exception $e){

            session()-> flash('type','danger');
            session()-> flash('message',$e->getMessage());


        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('admin.post.view', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $post=Post::find($id);
        if ($post) {
            return view('admin.post.edit', compact('post'));
        }

        else return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|string|unique:posts,id,'.$id,
            'status' =>'required|string',
          
        ]);

            try{
                    $post=Post::find($id);

                    $post->user_id  = auth()->id();
                    $post->title    = $request->title;
                    $post->desc     = $request->desc;
                    $post->status   = $request->status;
                    $post->update();

                    session()-> flash('type','success');
                    session()-> flash('message','Post updated Successfully.');

            }catch(Exception $e){
                session()-> flash('type','danger');
                session()-> flash('message',$e->getMessage());
        
                }
        
                return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        try{

            $post=Post::find($id);
            $post->delete();
            session()-> flash('type','success');
            session()-> flash('message','Deleted successfully.');


        }
        catch(Exception $e){
            session()-> flash('type','danger');
            session()-> flash('message','Failed to delete!!');

        }

        return redirect()->back();
        }
       
    
}
