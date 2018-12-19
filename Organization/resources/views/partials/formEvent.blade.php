@extends('layouts.master')


@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Event</h1>
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
                      <h3 class="card-title">Tambah Event</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('create_event') }}" method="POST">
                      {!! csrf_field() !!}
                      <div class="card-body">
                        <div class="form-group {{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Nama Organisasi</label>
                            <select id="organization_id_organization" name="organization_id_organization" class="form-control">
                                <option value="">--- Select organizations ---</option>
                                @foreach ($organization as $key => $value)
                                    <option value="{{ $value->id_organization }}" {{ old('organization') == $key ? 'selected' : ''}}>{{ $value->nama_organization }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('organization'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('organization') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Event</label>
                          <input name="nama_event" value = "{{ old('nama_event') }}" type="text" class="form-control" placeholder="Nama Event">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Deskripsi Event</label>
                          <input name="deskripsi_event" value = "{{ old('deskripsi_event') }}" type="text" class="form-control" placeholder="Deskripsi Event">
                        </div>
                       <div class="form-group">
                          <label for="exampleInputEmail1">Waktu Mulai</label>
                          <input class="date form-control" name="time_start" value = "{{ old('time_start') }}" type="datetime" placeholder="Waktu mulai">
                          <script type="text/javascript">
                            $('.date').datepicker({  
                               format: 'yyyy-mm-dd'
                             });  
                          </script>  
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Waktu Selesai</label>
                          <input class="date form-control" name="time_finish" value = "{{ old('time_finish') }}" type="datetime" placeholder="Waktu Selesai">
                          <script type="text/javascript">
                            $('.date').datepicker({  
                               format: 'yyyy-mm-dd'
                             });  
                          </script>  
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Poin Reward</label>
                          <input name="points_reward" value = "{{ old('points_reward') }}" type="text" class="form-control" placeholder="Banyaknya reward">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tempat</label>
                          <input name="tempat" value = "{{ old('tempat') }}" type="text" class="form-control" placeholder="Tempat">
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