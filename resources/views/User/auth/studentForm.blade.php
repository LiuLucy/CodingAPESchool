<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">名字</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name[]" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('card_id') ? ' has-error' : '' }}">
    <label for="card_id" class="col-md-4 control-label">身分證字號</label>

    <div class="col-md-6">
          <input id="card_id" type="text" class="form-control" name="card_id[]" required>
        @if ($errors->has('card_id'))
            <span class="help-block">
                <strong>{{ $errors->first('card_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
    <label for="gender" class="col-md-4 control-label">性別</label>

    <div class="col-md-6">
        <select class="" name="gender[]">
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

<div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
    <label for="birthday" class="col-md-4 control-label">生日</label>

    <div class="col-md-6">
        <input type="date" name="birthday[]" value="2018-02-25">
        @if ($errors->has('birthday'))
            <span class="help-block">
                <strong>{{ $errors->first('birthday') }}</strong>
            </span>
        @endif
    </div>
</div>
<input type="hidden" name="type_id[]" value="2">
<input type="hidden" name="password[]" value="0">
