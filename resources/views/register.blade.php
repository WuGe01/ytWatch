@extends('layout.app')

@section('main')

<div class="text-bg-secondary h-body">
    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 30rem;">
            <div class="card-header">
                Watch YT
              </div>
            <div class="card-body">
                <form action="{{ route("postRegister") }}" method="post">
                    @csrf
                    <div class="form-floating m-2">
                        <input type="text" class="form-control" name="account" placeholder="帳號"
                            aria-label="Account">
                        <label for="Account">帳號 account</label>
                    </div>

                    <div class="form-floating m-2">
                        <input type="text" class="form-control" name="name" placeholder="名稱"
                            aria-label="Name">
                        <label for="Name">名稱 Name</label>
                    </div>

                    <div class="form-floating m-2">
                        <input type="email" class="form-control" name="email" placeholder="信箱"
                            aria-label="Email">
                        <label for="Email">信箱 Email</label>
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
                    
                    <div class="m-2 d-flex justify-content-between">
                        <input  type="submit" class="btn btn-outline-primary" value="註冊">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection