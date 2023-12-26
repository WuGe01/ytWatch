<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite('resources/css/app.css')
    </head>
    <body class="h-100 bg-dark-subtle">
        @include('layout.header')


        <div class="text-bg-secondary">
            <form action="" method="post">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text">帳號</span>
                    <input type="text" class="form-control" placeholder="帳號" aria-label="Username">
                </div>

                <div class="input-group flex-nowrap">
                    <span class="input-group-text">密碼</span>
                    <input type="password" class="form-control" placeholder="密碼" aria-label="Username">
                </div>
            </form>
        </div>


        @include('layout.footer')
        @vite('resources/js/app.js')
    </body>
</html>
