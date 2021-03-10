@extends('admin.components.layouts')

@section('title')
Manage Categories
@endsection


@section('content')

<h4 class="text-center m-5">Manage Category</h4>

      <div class="alert alert-{{session('type')}}">{{session('message')}}
      
      </div>  
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

@endsection
