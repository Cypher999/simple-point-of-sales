@extends('layout.admin')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit User</h3>
      </div>
      <!-- /.card-header -->
      <form method="post" action="{{url('admin/user/edit-data',$data->id)}}" enctype="multipart/form-data" class="card-body">
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
            <lable>Role</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                </div>
                <select name="role" class="form-control" id="role">
                    <option value="superadmin" >Superadmin</option>
                    <option value="admin gudang">Admin Gudang</option>
                    <option value="admin penjualan">Admin Penjualan</option>
                </select>
            </div>
        </div>
        @error('role')
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