@extends('layout.app')

@section('main')

<div class="text-bg-secondary h-body">
    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 30rem;">
            <div class="card-header">
                Watch YT 修改會員資輛
            </div>
            <div class="card-body">
                <form action="{{ route("member.edit") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating m-2">
                        <input type="text" class="form-control" name="name" placeholder="名稱"
                            aria-label="Name">
                        <label for="Name">名稱 Name</label>
                    </div>

                    <div class="form-floating m-2">
                        <input type="password" class="form-control" name="password" placeholder="密碼"
                            aria-label="Password">
                        <label for="Password">密碼 password</label>
                    </div>

                    <div class="form-floating m-2">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="確認密碼"
                            aria-label="password_confirmation">
                        <label for="password_confirmation">確認密碼 password confirmation</label>
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
                        <input  type="submit" class="btn btn-outline-primary" value="發送">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection