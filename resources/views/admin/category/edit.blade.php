
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

        <div class="card-header text-center">Update Category</div>

        <div class="card-body">

            @if(session('message'))
            <div class="alert alert-{{session('type')}}">{{session('message')}}</div>  
            @endif

            <form action="{{route('admin.category.update',$category->id)}}" method="Post"> 
                @csrf
                @method ('PUT')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="name" name="name" id="name" value="{{$category->name}}" placeholder="Enter category name">
                        @error('name')
                        <span class = "text-danger font-italic">{{ $message}}</span>
                        @enderror
                    </div>
                   
                    <div class="form-group">
                            <label for="status">Status:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="status" id="active" value="active" {{$category->status == 'active'?'checked' : ''}}>
                                <label class="form-check-label" for="active">Active</label>
                              
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="status" id="inactive" value="inactive" {{$category->status == 'inactive'?'checked' : ''}}>
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
 