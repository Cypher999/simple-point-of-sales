@extends('layout.gudang')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Profil</h3>
      </div>
      <!-- /.card-header -->
      <form method="post" action="{{url('gudang/profil/edit-data')}}" enctype="multipart/form-data" class="card-body">
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
        @csrf
        <div class="form-group mb-3">
            <lable>Username</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{$data->username}}">
            </div>
        </div>
        @error('username')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <div class="form-group mb-3">
            <lable>Foto User</lable>
            <div class="input-group mt-2">
                <div class="custom-file">
                <input type="file" class="custom-file-input" name="photo" id="photo">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
            </div>
            <img src="{{url('img/'.$data->photo)}}" id="prev" style="width:100px;height:100px"/>
        </div>
        @error('photo')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <button type="submit" class="btn btn-info">Simpan</button>
      </form>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Password</h3>
      </div>
      <!-- /.card-header -->
      <form method="post" action="{{url('gudang/profil/edit-password')}}" enctype="multipart/form-data" class="card-body">
        @csrf
        <div class="form-group mb-3">
            <lable>Password Lama</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" name="lama" class="form-control" placeholder="Password Lama">
            </div>
        </div>
        @error('lama')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <div class="form-group mb-3">
            <lable>Password Baru</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" name="password" class="form-control" placeholder="Password Baru">
            </div>
        </div>
        @error('password')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <div class="form-group mb-3">
            <lable>Konfirmasi Password</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" name="confirm" class="form-control" placeholder="Konfirmasi Password">
            </div>
        </div>
        @error('confirm')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <button type="submit" class="btn btn-info">Simpan</button>
      </form>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<script>
    $(document).ready(function(){
        $("#role").val("{{$data->role}}");
        $("#photo").on('change',function(e){
            const photo=URL.createObjectURL(e.target.files[0]);
            $("#prev").attr('src',photo);
        })
    })
</script>
@endsection