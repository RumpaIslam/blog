@extends('admin.components.layouts')

@section('title')
Manage Categories
@endsection


@section('content')
<div class=" m-5">
<h4 class="text-center m-2">Manage Post</h4>

@if(session('message'))
      <div class="alert alert-{{session('type')}}">{{session('message')}}</div>  
      @endif
<table class="table table-bordered table-striped text-center">

    <tr>
        <th>SL. No</th>
        <th>Post Title</th>
        <th>Post details</th>
        <th>Image</th>
        <th>More Details</th>
        
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach($posts as $post)
    <tr>
    

        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->desc}}</td>
        <td><img src="{{$post->image}}" width="60px"> </td>

        <td><a href="#" target="_blank">Click here</a></td>
        <td>{{$post->status}}</td>
        <td>
        <a class="btn btn-info btn-sm" href="{{route('admin.post.show',$post->id)}}">View</a>
        <a class="btn btn-info btn-sm m-2" href="{{route('admin.post.edit',$post->id)}}">edit</a>
        
        <form action="{{route('admin.post.destroy', $post->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" @if(session()->get('user.type')==1) type="Submit"  @else disabled @endif >Delete</button>
        
        </form>
   
        </td>

    </tr>
@endforeach
</table>

{{$posts->links()}}
</div>
@endsection
