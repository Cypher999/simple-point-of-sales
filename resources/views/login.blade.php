@extends('layout.public')
@section('content')
<div class="card card-info col-10 col-md-8 col-lg-5">
    <div class="card-header">
    <h3 class="card-title">Login</h3>
    </div>
    <form class="card-body" method="post" enctype="multipart/form-data" action="{{ url('login') }}">
        @csrf
        @error('system')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            
        @enderror
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        @error('username')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        @error('password')
                <div class="alert alert-danger">
                    {{ $message}}
                </div>
            @enderror
        <button type="submit" class="btn btn-info">Sign in</button>
    </form>
    <!-- /.card-body -->
</div>
@endsection