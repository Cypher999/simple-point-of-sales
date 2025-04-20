@extends('layout.admin')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Barang</h3>
      </div>
      <!-- /.card-header -->
      <form method="post" action="{{url('admin/barang/add')}}" enctype="multipart/form-data" class="card-body">
        @csrf
        <div class="form-group mb-3">
            <lable>Nama Barang</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                </div>
                <input type="text" name="nama" class="form-control" placeholder="Nama Barang">
            </div>
        </div>
        @error('nama')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <div class="form-group mb-3">
            <lable>Harga Barang</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                </div>
                <input type="text" name="harga" class="form-control" placeholder="Harga Barang">
            </div>
        </div>
        @error('harga')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <div class="form-group mb-3">
            <lable>Stok</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-archive"></i></span>
                </div>
                <input type="text" name="stok" class="form-control" placeholder="Stok">
            </div>
        </div>
        @error('stok')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <button type="submit" class="btn btn-info">Save</button>
      </form>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection