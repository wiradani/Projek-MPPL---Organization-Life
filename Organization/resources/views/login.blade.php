<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Sign UP</title>
</head>
<body>
    <div class="container">
        <div class="left"></div>
        <div class="right">
            <div class="formBox">
                <h1>Sign UP</h1>
                <h2>Welcome Back, Please login to your account</h2>
                <div class="box"> 
                <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="POST">
                     {!! csrf_field() !!}
                    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}"
                               placeholder="{{ trans('adminlte::adminlte.email') }}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input type="password" name="password" class="form-control"
                               placeholder="{{ trans('adminlte::adminlte.password') }}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>   
                    <input type="submit" name="" value="Login">
                </form>
                </div>
                <input onClick="window.location.href='{{ url(config('adminlte.register_url', 'register')) }}'" type="submit" name="" value="Sign up">
            </div>
        </div>
    </div>
</body>
</html>