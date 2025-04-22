@extends('layout.penjualan')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Data Penjualan Barang</h3>
      </div>
      <!-- /.card-header -->
      <form method="post" action="{{url('penjualan/penjualan/edit',$data->id)}}" enctype="multipart/form-data" class="card-body">

      @csrf
        <div class="form-group mb-3">
            <lable>Barang</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                </div>
                <select name="barang" id="barang" class="form-control">
                    @foreach($barang as $b)
                        <option value="{{$b->id}}">{{$b->nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @error('barang')
            <div class="alert alert-danger">
                {{ $message}}
            </div>
        @enderror
        <div class="form-group mb-3">
            <lable>Jumlah Penjualan</lable>
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-archive"></i></span>
                </div>
                <input type="text" value="{{$data->jumlah}}" name="jumlah" class="form-control" placeholder="jumlah">
            </div>
        </div>
        @error('jumlah')
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