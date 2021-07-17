<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



  <!-- Custom fonts for this template-->
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
<link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
</head>
<body>
    

       <div class="container">
           
            @yield('content')
       

         <!-- Footer -->
         @yield('footer')
      <!-- End of Footer -->
    </div>


</body>
</html>
