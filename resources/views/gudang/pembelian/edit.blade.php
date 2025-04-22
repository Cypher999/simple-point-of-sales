@extends('layout.gudang')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Data Pembelian Barang</h3>
      </div>
      <!-- /.card-header -->
      <form method="post" action="{{url('gudang/pembelian/edit',$data->id)}}" enctype="multipart/form-data" class="card-body">
        @csrf
        <div class="form-group mb-3">
            <lable>Nama Barang</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                </div>
                <input type="text" name="nama" class="form-control" placeholder="Nama Barang" disabled value="{{$data->barang->nama}}">
            </div>
        </div>
        <div class="form-group mb-3">
            <lable>Harga Pembelian</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                </div>
                <input type="text" name="harga" class="form-control" placeholder="Harga Pembelian" value="{{$data->harga}}">
            </div>
        </div>
        @error('harga')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <div class="form-group mb-3">
            <lable>Jumlah Pembelian</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-archive"></i></span>
                </div>
                <input type="text" name="jumlah" class="form-control" placeholder="jumlah" value="{{$data->jumlah}}">
            </div>
        </div>
        @error('jumlah')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <div class="form-group mb-3">
            <lable>Nama Suplier<lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-archive"></i></span>
                </div>
                <input type="text" name="suplier" class="form-control" placeholder="Nama Suplier" value="{{$data->suplier}}">
            </div>
        </div>
        @error('suplier')
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
@endsection