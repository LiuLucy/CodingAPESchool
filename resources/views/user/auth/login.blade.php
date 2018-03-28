@extends('layouts.app')

@section('content')
  <div class="card login-container">
    <div class="card-header bg-warning text-center">
      登入
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{action('User\UserAuthController@login')}}">
          <div class="form-group{{ $errors->has('card_id') ? ' has-error' : '' }}">
              <label for="card_id" class="col-md-4 control-label">帳號</label>
                  <input id="card_id" type="text" class="form-control" name="card_id" value="{{ old('card_id') }}" required autofocus>
                      <span class="help-block">
                          @if ($errors->has('card_id'))
                            <strong class="error_mas">{{ $errors->first('card_id') }}</strong>
                          @endif
                      </span>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">密碼</label>
                  <input id="password" type="password" class="form-control" name="password" required>
                      <span class="help-block">
                        @if ($errors->has('password'))
                            <strong class="error_mas">{{ $errors->first('password') }}</strong>
                        @endif
                            <strong class="error_mas">{{ $errors->first('error_msg') }}</strong>
                      </span>
          </div>

          <div class="form-group">
              <div class="checkbox">
                  <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 記住我
                  </label>
              </div>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-outline-info">
                  登入
              </button>
          </div>
            {{ csrf_field() }}
      </form>
    </div>
  </div>
@endsection
