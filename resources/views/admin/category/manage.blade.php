@extends('admin.components.layouts')

@section('title')
Manage Categories
@endsection


@section('content')
<div class="container m-5">
<h4 class="text-center m-2">Manage Category</h4>

@if(session('message'))
      <div class="alert alert-{{session('type')}}">{{session('message')}}</div>  
      @endif
<table class="table table-bordered table-striped text-center">

    <tr>
        <th>SL. No</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach($categories as $category)
    <tr>
    

        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->slug}}</td>
        <td>{{$category->status}}</td>
        <td>
        <a class="btn btn-info btn-sm" href="{{route('admin.category.show',$category->id)}}">View</a>
        <a class="btn btn-info btn-sm m-2" href="{{route('admin.category.edit',$category->id)}}">edit</a>
        <form action="{{route('admin.category.destroy', $category->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
        
        </form>
   
        </td>

    </tr>
@endforeach
</table>

{{$categories->links()}}
</div>
@endsection
