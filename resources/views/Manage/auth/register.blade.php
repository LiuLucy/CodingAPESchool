@extends('layouts.manage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">管理員註冊</div>
                <div class="panel-body">
                  <form class="form-horizontal" method="POST" action="{{ action('Manage\ManageAuthController@register') }}">
                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="name" class="col-md-4 control-label">名字</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name" required autofocus>
                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                          <label for="nickname" class="col-md-4 control-label">綽號</label>

                          <div class="col-md-6">
                              <input id="nickname" type="text" class="form-control" name="nickname" required autofocus>

                              <span class="help-block">
                                  @if ($errors->has('nickname'))
                                      <strong>{{ $errors->first('nickname') }}</strong>
                                  @endif
                                      <strong class="error_mas">{{ $errors->first('error_regist_nickname') }}</strong>
                                  </span>


                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-md-4 control-label">電子郵件</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                  <span class="help-block">
                                    @if ($errors->has('email'))
                                      <strong>{{ $errors->first('email') }}</strong>
                                    @endif
                                      <strong class="error_mas">{{ $errors->first('error_regist_email') }}</strong>
                                  </span>
                          </div>

                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label for="password" class="col-md-4 control-label">密碼</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>

                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                          <label for="gender" class="col-md-4 control-label">性別</label>

                          <div class="col-md-6">
                              <select class="" name="gender">
                                  <option value="M" selected>男</option>
                                  <option value="F">女</option>
                              </select>
                              @if ($errors->has('gender'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('gender') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                          <label for="phone" class="col-md-4 control-label">手機號碼</label>

                          <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" required>
                              @if ($errors->has('phone'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('phone') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <input type="hidden" name="group_id" value="1">

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  註冊
                              </button>
                          </div>
                      </div>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
