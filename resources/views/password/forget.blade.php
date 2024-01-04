@extends('layout.app')

@section('main')

<div class="text-bg-secondary h-body">
    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 30rem;">
            <div class="card-header">
                Watch YT 忘記密碼
            </div>
            <div class="card-body">
                <form action="{{ route("password.email") }}" method="post">
                    @csrf
                    <div class="form-floating m-2">
                        <input type="text" class="form-control" name="email" placeholder="信箱"
                            aria-label="email">
                        <label for="email">信箱 email</label>
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