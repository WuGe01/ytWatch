<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Watch YT</title>

    @vite('resources/css/app.css')
</head>

<body class="vh-100 bg-dark-subtle">
    @include('layout.header')

    @yield('main')

    @include('layout.footer')
    
    @vite('resources/js/app.js')

    @yield('script')
</body>
</html>