@extends('layout.admin')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card overflow-auto">
      <div class="card-header">
        <h3 class="card-title">Data Pembelian Barang</h3>
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
        <div class="mb-2">
          <div>Nama Barang</div>
          <div class="text-lg fw-bold">{{$barang->nama}}</div>
        </div>
        <div class="row mb-2">
          <a href="{{url('admin/pembelian/add',$barang->id)}}" class="d-block col-5 col-sm-3 col-md-2">
            <button type="button" class="btn btn-block btn-outline-primary">Tambah Data</button>
          </a>
          <a href="{{url('admin/barang')}}" class="d-block col-5 col-sm-3 col-md-2">
            <button type="button" class="btn btn-block btn-outline-warning">Kembali</button>
          </a>
        </div>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>Nama Suplier</th>
                <th>Harga</th>
                <th>Jumlah Pembelian</th>
                <th>Tanggal Pembelian</th>
                <th>Kontrol</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $d)
                <tr>
                    <td>{{$d->suplier}}</td>
                    <td>{{$d->harga}}</td>
                    <td>{{$d->jumlah}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>
                      <div class="row">
                        <a class="m-2 col-10 col-md-5 col-lg-3 d-block" href="{{url('admin/pembelian/edit',$d->id)}}">
                          <button type="button" class="btn btn-block btn-warning">Edit Data</button>
                        </a>
                        <a class="m-2 col-10 col-md-5 col-lg-3 d-block" href="{{url('admin/pembelian/remove',$d->id)}}">
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