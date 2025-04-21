@extends('layout.admin')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card overflow-auto">
      <div class="card-header">
        <h3 class="card-title">Data User</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
          </div>
      @endif
        @error('system')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message}}
            </div>
        @enderror
        <a href="{{url('admin/user/add')}}">
          <button type="button" class="btn btn-block btn-outline-primary col-5 col-sm-3 col-md-2 mb-2">Tambah Data</button>
        </a>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>Username</th>
                <th>Role</th>
                <th>Kontrol</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $d)
                <tr>
                    <td>{{$d->username}}</td>
                    <td>{{$d->role}}</td>
                    <td>
                      <div class="row">
                        <a class="m-2 col-10 col-md-5 col-lg-3 d-block" href="{{url('admin/user/edit-data',$d->id)}}">
                          <button type="button" class="btn btn-block btn-warning">Edit Data</button>
                        </a>
                        <a class="m-2 col-10 col-md-5 col-lg-3 d-block" href="{{url('admin/user/edit-password',$d->id)}}">
                          <button type="button" class="btn btn-block btn-warning">Edit Password</button>
                        </a>
                        <a class="m-2 col-10 col-md-5 col-lg-3 d-block" href="{{url('admin/user/remove',$d->id)}}">
                          <button type="button" class="btn btn-block btn-danger">Hapus Data</button>
                        </a>
                      </div>
                    </td>
                </tr>
            @endforeach 
          </tbody>
          
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection