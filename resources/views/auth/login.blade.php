{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}

{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}

{{--    <title>SB Admin 2 - Login</title>--}}

{{--    <!-- Custom fonts for this template-->--}}
{{--    <link href="{{asset('sb-admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">--}}
{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"--}}
{{--        rel="stylesheet">--}}

{{--    <!-- Custom styles for this template-->--}}
{{--    <link href="{{asset('sb-admin/css/sb-admin-2.min.css')}}" rel="stylesheet">--}}

{{--</head>--}}
@extends('layouts.guest2')



@section('content')
<div class="l-login container p-5">
    <div class="l-login__box row p-5">
        <h1 class="col-md-12 o-loginTitle">會員登入</h1>
        <div class="col-md-12 pt-5">
            <form class="row l-login__info" method="POST" action="{{ route('login') }}">
                <!-- <div class=""> -->
                {{ csrf_field() }}
                <div class="col-md-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control form-control-user o-input" name="email"
                        value="{{ old('email') }}" placeholder="會員帳號" autofocus>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-md-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control form-control-user o-input" name="password"
                        placeholder="輸入密碼" required>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-md-12 form-group">
                    <div class="checkbox">
                        <label style="color: #4C2A70;">
                            <input type="checkbox" name="remember" class="o-input" {{ old('remember') ? 'checked' : '' }}> 記住帳號
                        </label>
                    </div>
                </div>

                <!-- <div class="col-md-12 form-group"> -->
                <button class="col-md-12 o-btn" type="submit">
                    登入
                </button>
                <div class="col-md-6">
                    <a href="{{url('line')}}" class="o-basicLink btn btn-user btn-block line">
                        Login with Line
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{route('facebook-login')}}" class="o-basicLink btn btn-user btn-block line">
                        Login with Meta
                    </a>
                </div>
            </form>
        </div>
        <hr>
        <a class="o-basicLink" href="{{route('register')}}">還不是會員？點我註冊</a>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('sb-admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('sb-admin/js/sb-admin-2.min.js')}}"></script>

@endsection