@extends('layouts.manage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
<<<<<<< HEAD
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('user.auth.login') }}">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
=======
                <div class="panel-heading">管理員登入</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{action('Manage\ManageAuthController@login')}}">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">帳號</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    <span class="help-block">
                                        @if ($errors->has('email'))
                                          <strong class="error_mas">{{ $errors->first('email') }}</strong>
                                        @endif
                                    </span>

>>>>>>> userAuthPage
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<<<<<<< HEAD
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
=======
                            <label for="password" class="col-md-4 control-label">密碼</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                    <span class="help-block">
                                      @if ($errors->has('password'))
                                          <strong class="error_mas">{{ $errors->first('password') }}</strong>
                                      @endif
                                          <strong class="error_mas">{{ $errors->first('error_msg') }}</strong>
                                    </span>
>>>>>>> userAuthPage
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
<<<<<<< HEAD
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
=======
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 記住我
>>>>>>> userAuthPage
                                    </label>
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
=======
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    登入
>>>>>>> userAuthPage
                                </button>
                            </div>
                        </div>
                          {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
