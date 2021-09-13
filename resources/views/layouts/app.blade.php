<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maw</title>

    <!--font awesome-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome5.11.2.min.css') }}">

    <!--bootstrap-->
    <!--    <link rel="stylesheet" href="dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600&display=swap" rel="stylesheet">

    <!--vendor css-->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.min.css') }}">

    <!--main styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">

    <style>
        .card {
            box-shadow: -5px 5px #eee;
        }
    </style>

    <!--jquery-->
    <script src="{{ asset('assets/js/jquery-3.4.0.min.js') }}"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/noty/noty.css')}}">
    <script src="{{ asset('admin_assets/plugins/noty/noty.min.js')}}"></script>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

@include('admin.partials._session')

@yield('content')

@include('layouts._footer')

<!--bootstrap-->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>

<!--vendor js-->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

<!--main scripts-->
<script src="{{ asset('assets/js/main.min.js') }}"></script>
</body>
</html>
