
@extends('admin.components.layouts')

@section('title')
Update Categories
@endsection


@section('content')

<h4 class="text-center m-5"></h4>


<div class="col-md-15">

            <!-- @if($errors -> any())
            <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
                        
            </div>
            @endif -->



    <div class="card">

        <div class="card-header text-center">Update Post</div>

        <div class="card-body">

            @if(session('message'))
            <div class="alert alert-{{session('type')}}">{{session('message')}}</div>  
            @endif

            <form action="{{route('admin.post.update',$post->id)}}" method="Post"> 
                @csrf
                @method ('PUT')
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input class="form-control " type="title" name="title" id="title" value="{{$post->title}}">
                        @error('title')
                        <span class = "text-danger font-italic">{{ $message}}</span>
                        @enderror
                    </div>
                   
                    <div class="form-group">
                        <label for="status">Post Details</label><br>
                        <input class="form-control " type="text" name="title" id="title" value="{{$post->desc}}" >
                        @error('title')
                        <span class = "text-danger font-italic">{{ $message}}</span>
                        @enderror
                            
                    </div>
        
                    <div class="form-group card-footer text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        
        
        </div>
        
    
    
    </div>


</div>
      
@endsection
 