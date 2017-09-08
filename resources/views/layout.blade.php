<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Leaflet style CSS -->
    <link href="assets/css/leaflet.css" rel="stylesheet">
    <title>{{ config('app.name', 'Sinchi') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/portfolio-item.css" rel="stylesheet">
    <script src="assets/jquery/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
      //THIS SECTION IS FOR THE AJAX CONECTION
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
      });
    </script> 
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
  </body>
<!-- Bootstrap core JavaScript -->

<script src="assets/popper/popper.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/highchart/js/highcharts.js"></script>
<script src="assets/js/leaflet.js"></script>
@yield('js')
</html>
