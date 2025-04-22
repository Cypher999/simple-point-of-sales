@extends('layout.admin')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Data Penjualan Barang</h3>
      </div>
      <!-- /.card-header -->
      <form method="post" action="{{url('admin/pengeluaran/edit',$data->id)}}" enctype="multipart/form-data" class="card-body">

      @csrf
        <div class="form-group mb-3">
            <lable>Keterangan</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                </div>
                <textarea name="keterangan" class="form-control" placeholder="keterangan">{{$data->keterangan}}</textarea>
            </div>
        </div>
        @error('keterangan')
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
            <lable>Harga</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                </div>
                <input type="text" name="harga" class="form-control" placeholder="Harga" value="{{$data->harga}}">
            </div>
        </div>
        @error('harga')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <div class="form-group mb-3">
            <lable>Satuan</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-cube"></i></span>
                </div>
                <input type="text" name="satuan" class="form-control" placeholder="Satuan" value="{{$data->satuan}}">
            </div>
        </div>
        @error('satuan')
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
        $("#barang").val("{{$data->barang_id}}");
    })
</script>
@endsection