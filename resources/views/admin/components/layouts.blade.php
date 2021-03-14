<!DOCTYPE html>
<html lang="en">

<head>
  <title>
  @yield('title')
  </title>
   @include('frontend.components.css')
</head>

<body>

 @include('admin.components.header')

  <!-- Page Content -->
  <div class="container" style="min-height:575px !important;">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8 container">

        @yield('content')

      </div>
    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
 @include('admin.components.footer')
 @include('frontend.components.scripts')
  

</body>

</html>
