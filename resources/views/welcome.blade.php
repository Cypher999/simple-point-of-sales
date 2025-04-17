@extends('layout/app')
@section('content')
<div class="d-flex w-100 align-items-center justify-content-center" style="min-height:100vh">
    <div class="card card-info col-10 col-md-8 col-lg-5">
        <div class="card-header">
        <h3 class="card-title">Login</h3>
        </div>
        <div class="card-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Username">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection