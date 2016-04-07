<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$titulo or 'Nome do sistema'}}</title>

        <!-- CSS Personalizado -->
        <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">

        <!-- Optional theme -->
        <link rel="stylesheet" href="{{url('/assets/css/bootstrap-theme.min.css')}}">


    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

        <!--scripts JS -->

        <!--Jquery -->
        <script src="{{url('/assets/js/jquery-2.2.2.min.js')}}"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="{{url('/assets/js/bootstrap.min.js')}}"></script>

    </body>
</html>