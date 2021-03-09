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

 @include('admin.components.header')

  <!-- Page Content -->
  <div class="container" style="min-height:550px;">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        @yield('content')

      </div>


  </div>
  <!-- /.container -->

  <!-- Footer -->
 @include('admin.components.footer')
 @include('frontend.components.scripts')
  

</body>

</html>
