<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Sinchi') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/portfolio-item.css" rel="stylesheet">
    @yield('style')
  </head>
  <body>
    @include('includes.navbar')

    <!-- Page Content -->
    <div class="container">
      @yield('content')
    </div>
    <!-- /.container -->
    @include('includes.footer')
    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/popper/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    @yield('js')
  </body>

</html>
