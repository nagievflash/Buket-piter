<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;900&display=swap" rel="stylesheet">

    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/favicon.ico">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
    @include('layouts.header')

    @yield('content')

    <script src="{{ asset('js/app.js') }}" ></script>
    @yield('script')
</body>
</html>
