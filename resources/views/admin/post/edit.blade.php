
@extends('admin.components.layouts')

@section('title')
Update post
@endsection


@section('content')

<h4 class="text-center m-5"></h4>


<div class="col-md-15">

            @if($errors -> any())
            <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
                        
            </div>
            @endif



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
                        <input class="form-control " type="text" name="desc" id="desc" value="{{$post->desc}}" >
                        @error('desc')
                        <span class = "text-danger font-italic">{{ $message}}</span>
                        @enderror
                            
                    </div>

                    <div class="form-group">
                            <label for="status">Status:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="status" id="active" value="active" {{$post->status == 'active'?'checked' : ''}}>
                                <label class="form-check-label" for="active">Active</label>
                              
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="status" id="inactive" value="inactive" {{$post->status == 'inactive'?'checked' : ''}}>
                                <label class="form-check-label" for="inactive">Inactive</label>
                              
                            </div>
                    </div>
        
                    <div class="form-group card-footer text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        
        
        </div>
        
    
    
    </div>


</div>
      
@endsection
 