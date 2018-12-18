@extends('layouts.adminlte')
@section('body_class', 'register-page')
@section('body')
<body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="{{ url('/') }}"><b>Organization</b>LIFE</a>
      </div>
    
      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Register a new membership</p>
    
          <form action="{{ route('register') }}" method="POST">
            {!! csrf_field() !!}

            {{-- NAMA ORGANISASI INPUT --}}
            <div class="input-group {{ $errors->has('nama_organization') ? 'has-error' : '' }} mb-3">
              <input name="nama_organization" value = "{{ old('nama_organization') }}" type="text" class="form-control" placeholder="Nama Organisasi">
                @if ($errors->has('nama_organization'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nama_organization') }}</strong>
                    </span>
                @endif
              <div class="input-group-append">
                  <span class="fa fa-user input-group-text"></span>
              </div>
            </div>

            {{-- DESKRIPSI ORGANISASI TEXTAREA --}}
            <div class="form-group {{ $errors->has('deskripsi_organization') ? 'has-error' : '' }}">
                <textarea name="deskripsi_organization" value = "{{ old('deskripsi_organization') }}" class="form-control" rows="3" placeholder="Deskripsi Organisasi"></textarea>
                @if ($errors->has('deskripsi_organization'))
                    <span class="help-block">
                        <strong>{{ $errors->first('deskripsi_organization') }}</strong>
                    </span>
                @endif
            </div>

            {{-- NAMA KETUA ORGANISASI INPUT --}}
            <div class="input-group {{ $errors->has('name_user') ? 'has-error' : '' }} mb-3">
              <input name="name_user" value = "{{ old('name_user') }}" type="text" class="form-control" placeholder="Nama Ketua">
                @if ($errors->has('name_user'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name_user') }}</strong>
                    </span>
                @endif
              <div class="input-group-append">
                  <span class="fa fa-user input-group-text"></span>
              </div>
            </div>


            {{-- EMAIL INPUT --}}
            <div class="input-group {{ $errors->has('email_user') ? 'has-error' : '' }} mb-3">
                <input name="email_user" value = "{{ old('email_user') }}" type="email" class="form-control" placeholder="Email">
                @if ($errors->has('email_user'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email_user') }}</strong>
                    </span>
                @endif
                <div class="input-group-append">
                    <span class="fa fa-envelope input-group-text"></span>
                </div>
            </div>

            {{-- PASSWORD INPUT --}}
            <div class="input-group {{ $errors->has('password') ? 'has-error' : '' }} mb-3">
                <input name="password" value = "{{ old('password') }}" type="password" class="form-control" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div class="input-group-append">
                    <span class="fa fa-lock input-group-text"></span>
                </div>
            </div>

            {{-- PASSWORD INPUT --}}
            <div class="input-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }} mb-3">
                <input name="password_confirmation" value = "{{ old('password_confirmation') }}" type="password" class="form-control" placeholder="Confirm Password">
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
                <div class="input-group-append">
                    <span class="fa fa-lock input-group-text"></span>
                </div>
            </div>        
            <div class="row">
              <div class="col-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> I agree to the <a href="#">terms</a>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

    
          <div class="col-8 mb-3">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}" class="text-center">I already have a membership</a>
          </div>
          
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
    
</body>
@stop