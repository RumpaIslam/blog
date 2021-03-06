 <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contact-form')}}">Contact</a>
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.showregistration')}}">Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.login-form')}}">Login</a>
          </li>
          @endguest

          @auth

          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dashboard')}}"> {{auth()->user()->name}}</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.logout')}}">Logout</a>
          </li>
          @endauth

        </ul>
      </div>
    </div>
  </nav>