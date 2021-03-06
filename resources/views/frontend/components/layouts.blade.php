<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>
  @yield('title')
  </title>
   @include('frontend.components.css')
</head>

<body>

 @include('frontend.components.header')

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        @yield('content')

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        @include('frontend.components.right-sidebar')
       
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
 @include('frontend.components.footer')
 @include('frontend.components.scripts')
  

</body>

</html>
