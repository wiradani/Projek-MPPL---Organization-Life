@extends('layouts.master')


@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Reward</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@if(session()->has('message'))
    
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <!-- Main content -->
    <section class="content">
            <div class="container-fluid">
              {{-- <div class="row"> --}}
                {{-- <!-- left column -->
                <div class="col-md-6"> --}}
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Tambah Reward</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('create_reward') }}" method="POST">
                      {!! csrf_field() !!}
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Reward</label>
                          <input name="nama_reward" value = "{{ old('nama_reward') }}" type="text" class="form-control" placeholder="Nama Reward">
                        </div>
                        <div class="form-group {{ $errors->has('deskripsi_reward') ? 'has-error' : '' }}">
                        <label for="exampleInputEmail1">Deskripsi Reward</label>
                            <textarea name="deskripsi_reward" value = "{{ old('deskripsi_reward') }}" class="form-control" rows="3" placeholder="Deskripsi Reward"></textarea>
                            @if ($errors->has('deskripsi_organization'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deskripsi_organization') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Poin Reward</label>
                          <input name="points_reward" value = "{{ old('points_reward') }}" type="text" class="form-control" placeholder="Poin Reward">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Kuantitas Reward</label>
                          <input name="quantity_reward" value = "{{ old('quantity_reward') }}" type="text" class="form-control" placeholder="Kuantitas Reward">
                        </div>
                        
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
            </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->
@endsection