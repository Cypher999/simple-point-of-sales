@extends('layout.admin')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card overflow-auto">
      <div class="card-header">
        <h3 class="card-title">Data Barang</h3>
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
        <a href="{{url('admin/barang/add')}}">
          <button type="button" class="btn btn-block btn-outline-primary col-5 col-sm-3 col-md-2 mb-2">Tambah Data</button>
        </a>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kontrol</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $d)
                <tr>
                    <td>{{$d->nama}}</td>
                    <td>{{$d->harga}}</td>
                    <td>{{$d->stok}}</td>
                    <td>
                      <div class="row">
                        <a class="m-2 col-10 col-md-5 d-block" href="{{url('admin/barang/edit',$d->id)}}">
                          <button type="button" class="btn btn-block btn-warning">Edit Data</button>
                        </a>
                        <a class="m-2 col-10 col-md-5 d-block" href="{{url('admin/barang/remove',$d->id)}}">
                          <button type="button" class="btn btn-block btn-danger">Hapus Data</button>
                        </a>
                        <a class="m-2 col-10 col-md-5 d-block" href="{{url('admin/pembelian',$d->id)}}">
                          <button type="button" class="btn btn-block btn-success">Tambah stok</button>
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