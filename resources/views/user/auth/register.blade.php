@extends('layouts.app')

@section('content')
  <div class="card login-container">
    <div class="card">
        <div class="card-header bg-warning text-center">
            註冊
        </div>
        <div class="card-body">
            <div class="panel panel-default">
                <div class="panel-body">
                @if(!session()->has('is_done'))
                  <form class="form-horizontal" method="POST" action="{{ action('User\UserAuthController@register') }}">
                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="name" class="col-md-4 control-label">名字</label>
                              <input id="name" type="text" class="form-control" name="name" required autofocus>

                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-md-4 control-label">電子郵件</label>
                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                  <span class="help-block">
                                      @if ($errors->has('email'))
                                          <strong>{{ $errors->first('email') }}</strong>
                                      @endif
                                      <strong class="error_mas">{{ $errors->first('error_regist_email') }}</strong>
                                  </span>
                      </div>

                      <input id="password" type="hidden" class="form-control" name="password" value="0" required>

                      <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                          <label for="gender" class="col-md-4 control-label">性別</label> <br>
                              <select class="" name="gender">
                                  <option value="M" selected>男</option>
                                  <option value="F">女</option>
                              </select>
                              <br>
                              @if ($errors->has('gender'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('gender') }}</strong>
                                  </span>
                              @endif
                      </div>

                      <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                          <label for="birthday" class="col-md-4 control-label">生日</label> <br>
                              <input type="date" name="birthday" value="2018-02-25"> <br>
                              @if ($errors->has('birthday'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('birthday') }}</strong>
                                  </span>
                              @endif
                      </div>

                      <div class="form-group{{ $errors->has('card_id') ? ' has-error' : '' }}">
                          <label for="card_id" class="col-md-4 control-label">身份證字號</label>
                                <input id="card_id" type="text" class="form-control" name="card_id" required>
                                  <span class="help-block">
                                      @if ($errors->has('card_id'))
                                          <strong>{{ $errors->first('card_id') }}</strong>
                                      @endif
                                      <strong class="error_mas">{{ $errors->first('error_regist_card_id') }}</strong>
                                  </span>
                      </div>

                      <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                          <label for="phone" class="col-md-4 control-label">手機號碼</label>
                              <input id="phone" type="text" class="form-control" name="phone" required>
                              @if ($errors->has('phone'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('phone') }}</strong>
                                  </span>
                              @endif
                      </div>
                      <input type="hidden" name="type_id" value="1">
                      <div>
                          <label class="col-md-4 control-label">小朋友人數</label> <br>
                              <select class="" name="studentNumber">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                              </select>
                      </div> <br>

                      <div class="form-group">
                              <button type="submit" class="btn btn-primary">
                                  下一步
                              </button>
                      </div>

                  </form>
                  @else
                    <form class="form-horizontal" action="{{action('User\UserAuthController@registerStudent')}}" method="POST">
                       {{ csrf_field() }}
                        @for ($i = 0; $i < session()->get('studentNumber'); $i++)
                            @include('User.auth.studentForm')
                            <br>
                            <br>
                        @endfor
                        <span class="help-block">
                            <strong class="error_mas">{{ $errors->first('error_regist_card_id') }}</strong>
                        </span>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    註冊
                                </button>
                        </div>
                  </form>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
