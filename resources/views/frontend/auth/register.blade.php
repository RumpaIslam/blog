
@extends('frontend.components.layouts')

@section('title')

User Registration Form

@endsection


@section('content') 

      <div class="card mt-3">
        <div class="card-header">
          <h3>User Registration</h3>      
        </div>

        <div class="card-body">


        @if (session('message'))
        <div class="alert alert-success">
        {{session('message')}}
        
        </div>
        @endif
        @if($errors -> any())
            <div class="alert alert-danger">

            {{session('message')}}
             
                                   
            </div>
            @endif

        
             <!-- @if($errors -> any())
            <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            
            
            </div>
            @endif -->

            <form action="{{route('user.registration')}}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}" placeholder="Enter your name">
            </div>
            @error('name') <span class="text-danger">{{$message}}</span>@enderror
            
            <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}" placeholder="Enter your email address">
            </div>
            @error('email') <span class="text-danger">{{$message}}</span>@enderror

            <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
            </div>
            @error('password') <span class="text-danger">{{$message}}</span>@enderror


            <div class="form-group">
            <label for="password">Confirm Password</label>
            <input class="form-control" type="password" name="confirm_password"  id="confirm_password" placeholder="Enter your password">
            </div>

            <!-- <div class="form-group">
            <label for="photo">Profile Photo</label>
            <input type="file" name="photo" id="photo" >
            </div> -->
            @error('photo') <span class="text-danger">{{$message}}</span>@enderror
            <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>

        </div>
      
      
      </div>

@endsection

      