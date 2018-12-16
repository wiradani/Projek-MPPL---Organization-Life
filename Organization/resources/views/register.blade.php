@extends('layouts.master')

<body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="{{ url('/') }}"><b>Organization</b>LIFE</a>
      </div>
    
      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Register a new membership</p>
    
          <form action="{{ url('/register') }}" method="POST">
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
{{--             
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Retype password">
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
              </div> --}}
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
          {{-- <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
              <i class="fa fa-facebook mr-2"></i>
              Sign up using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fa fa-google-plus mr-2"></i>
              Sign up using Google+
            </a>
          </div> --}}
    
          <div class="col-8 mb-3">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}" class="text-center">I already have a membership</a>
          </div>
          
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
    
</body>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Register</title>
</head>
<body>
    <div class="formBox">
        <h1>Create Account</h1>
        <h2>Create account below to start using Organization Life</h2>
        <form action="{{ url('/register') }}" method="POST">
            {!! csrf_field() !!}

            <input type="text" name="" placeholder="Nama Organisasi">
            <input type="text" name="" placeholder="Deskripsi Organisasi">
            <input type="text" name="" placeholder="Nama">
            <input type="text" name="" placeholder="Alamat E-mail">
            <input type="Password" name="" placeholder="Password">
            <input type="Password" name="" placeholder="Confirm Password">

            <input type="text" name="nama_organization" value="{{ old('nama_organization') }}">

            @if ($errors->has('nama_organization'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama_organization') }}</strong>
                </span>
            @endif
            
            <div class="form-group{{ $errors->has('deskripsi_organization') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Deskripsi Organisasi</label>
                <textarea class="col-md-40" name="deskripsi_organization" value="{{ old('deskripsi_organization') }}" required autofocus id="deskripsi_organization" placeholder="Enter deskripsi_organization"></textarea>
                
                @if ($errors->has('deskripsi_organization'))
                        <span class="help-block">
                            <strong>{{ $errors->first('deskripsi_organization') }}</strong>
                        </span>
                @endif

            </div>

            <div class="form-group{{ $errors->has('name_user') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Nama</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="name_user" value="{{ old('name_user') }}">

                    @if ($errors->has('name_user'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name_user') }}</strong>
                        </span>
                    @endif

                </div>
            </div>

            <div class="form-group{{ $errors->has('email_user') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Alamat E-Mail</label>

                <div class="col-md-6">
                    <input type="email" class="form-control" name="email_user" value="{{ old('email_user') }}">

                    @if ($errors->has('email_user'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email_user') }}</strong>
                        </span>
                    @endif

                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input type="password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif

                </div>
            </div>

            <div class="submitBox">    
                <input type="submit" name="" value="Register">
            </div>
        </form>
    </div>    
</body>
</html> --}}