<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <!-- Custom fonts for this template -->
    <script src="https://kit.fontawesome.com/1afd572273.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>

<body class="bg-custom">

@yield('content')

<!-- Bootstrap core JavaScript-->
<script src="{{asset('js/admin.js')}}"></script>

</body>
</html>
