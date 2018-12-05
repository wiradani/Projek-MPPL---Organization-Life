@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>List Kabinet</p>
    <section class="content">
      <div class="row">
      <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Kabinet</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <th>No</th>
                    <th>Nama Kabinet</th>
                    <th>Deskripsi Kabinet</th>
                    <th>Periode Kabinet</th>
                  </tr>
                  @foreach($kabinets as $kabinet)
                  <tr>
                    <td>{{ $number+=1 }}</td>
                    <th>{{$kabinet->nama_cabinet}}</th>
                    <th>{{$kabinet->deskripsi_cabinet}}</th>
                    <th>{{$kabinet->periode_cabinet}}</th>
                    <td>
                      <div class="btn-group">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit{{ $kabinet->id_cabinet }}" value="{{ $kabinet->id_cabinet }}">
                            <i class="fa fa-edit nav-icon"></i>
                          </button>
                          <!-- .modal edit -->
                          <div class="modal fade" id="modal-edit{{ $kabinet->id_cabinet }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit kabinet</h4>
                                    </div>
                                    <div class="modal-body">
                                    <form  action="/viewkabinet/{{$kabinet->id_cabinet}}" method="POST">
                                        <div class="form-group">
                                            <label>kabinet name</label>
                                            <input type="text" name = "nama_cabinet" class="form-control" placeholder="{{ $kabinet->nama_cabinet }}" value="{{ $kabinet->nama_cabinet }}" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" name = "deskripsi_cabinet" required>{{{ $kabinet->deskripsi_cabinet }}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Periode kabinet</label>
                                            <input type="text" name = "price" class="form-control" placeholder="{{ $kabinet->periode_cabinet }}" value="{{ $kabinet->periode_cabinet }}" required>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                    </div>
                                    </form>
                                  </div>
                                  <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                          </div>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $kabinet->id_cabinet }}" value="{{ $kabinet->id_cabinet }}">
                            <i class="fa fa-trash nav-icon"></i>
                          </button>
                        <!-- .modal delete -->
                          <div class="modal fade" id="modal-delete{{ $kabinet->id_cabinet }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Delete kabinet</h4>
                                    </div>
                                    <div class="modal-body">
                                    Are you sure want to delete this kabinet?
                                    </div>
                                    <div class="modal-footer">
                                      <form method="POST" action="{{ route('delete.kabinet', $kabinet) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                      </form>
                                    </div>
                                    </form>
                                  </div>
                                  <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                          </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
              <!-- /.card-body -->
              <!-- ./card-footer -->
              <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                      <li class="page-item"><a class="page-link" href="{{ $kabinets->previousPageUrl() }}">«</a></li>
                      <li class="page-item"><a class="page-link" href="{{ $kabinets->currentPage() }}">{{ $kabinets->currentPage() }}</a></li>
                      <li class="page-item"><a class="page-link" href="{{ $kabinets->nextPageUrl() }}">»</a></li>
                    </ul>
                  </div>
              <!-- ./ card-footer -->
            </div>
            <!-- /.card -->
          </div>
      </div>
      <!-- /.row -->
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
