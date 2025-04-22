@extends('layout.penjualan')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card overflow-auto">
      <div class="card-header">
        <h3 class="card-title">Data Penjualan Barang</h3>
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
        <div class="row mb-2">
          <a href="{{url('penjualan/penjualan/add')}}" class="d-block col-5 col-sm-3 col-md-2">
            <button type="button" class="btn btn-block btn-outline-primary">Tambah Data</button>
          </a>
        </div>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah Penjualan</th>
                <th>Tanggal Penjualan</th>
                <th>Kontrol</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $d)
                <tr>
                    <td>{{$d->barang->nama}}</td>
                    <td>{{$d->jumlah}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>
                      <div class="row">
                        <a class="m-2 col-10 col-md-5 d-block" href="{{url('penjualan/penjualan/edit',$d->id)}}">
                          <button type="button" class="btn btn-block btn-warning">Edit Data</button>
                        </a>
                        <a class="m-2 col-10 col-md-5 d-block" href="{{url('penjualan/penjualan/remove',$d->id)}}">
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