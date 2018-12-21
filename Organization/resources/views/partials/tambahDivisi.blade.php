@extends('layouts.master')


@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Divisi</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
            <div class="container-fluid">
              {{-- <div class="row"> --}}
                {{-- <!-- left column -->
                <div class="col-md-6"> --}}
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Tambah Divisi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('create_division') }}" method="POST">
                      {!! csrf_field() !!}
                      <div class="card-body">
                        <div class="form-group {{ $errors->has('cabinet') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Nama Kabinet</label>
                            <select id="cabinet_id_cabinet" name="cabinet_id_cabinet" class="form-control">
                                <option value="">--- Select cabinets ---</option>
                                @foreach ($cabinet as $key => $value)
                                    <option value="{{ $value->id_cabinet }}" {{ old('cabinet') == $key ? 'selected' : ''}}>{{ $value->nama_cabinet }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('cabinet'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cabinet') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Divisi</label>
                          <input name="nama_division" value = "{{ old('nama_division') }}" type="text" class="form-control" placeholder="Nama Kabinet">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Deskripsi Divisi</label>
                          <input name="deskripsi_division" value = "{{ old('deskripsi_division') }}" type="text" class="form-control" placeholder="Deskripsi Divisi">
                        </div>
                        <!--<div class="form-group">
                          <label for="exampleInputFile">File input</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text" id="">Upload</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                      </div> -->
                      <!-- /.card-body -->
      
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