@extends('layout.admin')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
                            <td> 4</td>
                        </tr>
                    @endforeach 
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        </div>
    </section>
</div>
@endsection