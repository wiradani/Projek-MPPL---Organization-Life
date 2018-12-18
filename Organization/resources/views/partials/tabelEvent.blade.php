@extends('layouts.master')

@section('content')
    
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tabel Event</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

    <div class="card">
    <div class="card-header">
      <h3 class="card-title">Striped Full Width Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped">
        <tr>
          <th style="width: 10px">#</th>
          <th>Nama Event</th>
          <th>Deskripsi Event</th>
          <th style="width: 40px">Label</th>
        </tr>
        @foreach($event as $e)
        <tr>
          <td>1.</td>
          <td>{{$e->nama_event}}</td>
          <td>{{$e->deskripsi_event}}</td>
        </tr>
        @endforeach
      </table>
    </div>
    <!-- /.card-body -->

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

@endsection