<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite('resources/css/app.css')
    </head>
    <body class="h-100">
        @include('layout.header')


        <div class="text-bg-secondary">

        </div>


        @include('layout.footer')
        @vite('resources/js/app.js')
    </body>
</html>
