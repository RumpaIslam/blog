
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
        
            <form action="{{route('registration')}}" method="POST"> 
            @csrf
            <div class="form-group">
            <label>Name:</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name">
            </div>
            
            <div class="form-group">
            <label>Email:</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email address">
            </div>

            <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
            </div>

            <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>

        </div>
      
      
      </div>

@endsection

      