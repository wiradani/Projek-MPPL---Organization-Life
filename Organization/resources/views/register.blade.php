@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('nama_organization') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Organisasi</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_organization" value="{{ old('nama_organization') }}">

                                @if ($errors->has('nama_organization'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_organization') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

        
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop
