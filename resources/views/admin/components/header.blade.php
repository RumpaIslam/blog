 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{route('admin.dashboard')}}">Dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

     

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item">
            <a class="nav-link {{request()->is('admin/dashboard')?'active':''}}" href="{{route('admin.dashboard')}}">Dashboard</a>
          </li> -->
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category 
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item {{request()->is('admin/category/create')?'active':''}}" href="{{route('admin.category.create')}}">Add Category</a>
                <a class="dropdown-item {{request()->is('admin/category')?'active':''}}" href="{{route('admin.category.index')}}">Manage Category</a>
            </div>
      </div>
         
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/dashboard')?'active':''}}" href="{{route('user.logout')}}">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>