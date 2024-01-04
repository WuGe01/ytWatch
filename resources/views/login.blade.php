@extends('layout.app')

@section('main')

<div class="text-bg-secondary h-body">
    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Watch YT
              </div>
            <div class="card-body">
                <form action="{{ route("postLogin") }}" method="post">
                    @csrf
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="m-2">
                        <a href="{{ route("password.forget") }}">忘記密碼？</a>
                    </div>

                    <div class="m-2 d-flex justify-content-between">
                        <input  type="submit" class="btn btn-outline-primary" value="登入">
                        <a type="button" href="{{ route("register") }}" class="btn btn-outline-secondary">註冊</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection