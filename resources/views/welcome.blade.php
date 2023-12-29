<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Watch YT</title>

    @vite('resources/css/app.css')

    <style>
        .h-body {
            height: calc(100vh - 80px);
        }
    </style>
</head>

<body class="vh-100 bg-dark-subtle">
    @include('layout.header')


    <div class="text-bg-secondary h-body">
        <div class="h-100 d-flex justify-content-center align-items-center">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Watch YT
                  </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-floating m-2">
                            <input type="text" class="form-control" name="account" placeholder="帳號"
                                aria-label="Account">
                            <label for="Account">帳號 account</label>
                        </div>

                        <div class="form-floating m-2">
                            <input type="password" class="form-control" name="password" placeholder="密碼"
                                aria-label="Password">
                            <label for="Password">密碼 password</label>
                        </div>

                        <div class="m-2 d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-primary">登入</button>
                            <a type="button" href="" class="btn btn-outline-secondary">註冊</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @include('layout.footer')
    @vite('resources/js/app.js')
</body>
</html>