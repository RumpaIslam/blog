
@extends('frontend.components.layouts')

@section('title')

User Login

@endsection


@section('content') 

      <div class="card mt-3">
        <div class="card-header">
          <h3>User Logiin</h3>      
        </div>

        <div class="card-body">

        @if (session('message'))
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

            <form action="{{route('user.login')}}" method="POST"> 
            @csrf
                       
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

            <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Login</button>
            </div>

            </form>

        </div>
      
      
      </div>

@endsection

      