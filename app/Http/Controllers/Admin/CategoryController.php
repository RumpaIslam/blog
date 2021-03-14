<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories=Category::SimplePaginate(5);
        // return $categories;
        
        return view ('admin.category.manage',compact('categories'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
       //dd('hello');
       return view('admin.category.create');
       
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
           'name'=>'required|string|unique:categories',
           'status' =>'required|string',
         
       ]);
       //dd(auth()->id());
       try{
        // $category=new Category();
        // $category->user_id = auth()->id();
        // $category->name=$request->name;
        // $category->status=$request->status;
        // $category->slug=strtolower(str_replace(' ', '-', $request->name));
        // $category->save();
     
        Category::create([
        'user_id' => auth()->id(),
        'name'    => $request->name,
        'status'  => $request->status,
        'slug'    => strtolower(str_replace(' ', '-', $request->name)),
        ]);

        session()-> flash('type','success');
        session()-> flash('message','Category Created Successfully.');


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
      //  dd($id);
     $category=Category::findorfail($id);
     //return $category;
     return view('admin.category.view',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
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
        //
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

            $cat=Category::find($id);
            $cat->delete();
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
