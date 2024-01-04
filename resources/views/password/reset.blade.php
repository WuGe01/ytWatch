@extends('layout.app')

@section('main')

<div class="text-bg-secondary h-body">
    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 30rem;">
            <div class="card-header">
                Watch YT 重設密碼
            </div>
            <div class="card-body">
                <form action="{{ route("password.update") }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">

                    <div class="form-floating m-2">
                        <input type="password" class="form-control" name="password" placeholder="新密碼"
                            aria-label="Password">
                        <label for="Password">新密碼 new password</label>
                    </div>

                    <div class="form-floating m-2">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="確認密碼"
                            aria-label="password_confirmation">
                        <label for="password_confirmation">確認密碼 password confirmation</label>
                    </div>

                    <div class="m-2 d-flex justify-content-between">
                        <input  type="submit" class="btn btn-outline-primary" value="確認">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection