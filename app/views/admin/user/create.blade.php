@extends('l.index')

@section('container')

  <div id="register" class="register">

    {{ Form::open(array('url' => 'admin/register', 'class' => 'am-form')) }}
        @if ($errors->has('register'))
          <div class="form-group has-error">
              <label for="inputError" class="control-label">{{ $errors->first('register', ':message') }}</label>
          </div>
        @endif

        <div class="form-group">
        {{ Form::label('username', '用户名') }}
        {{ Form::text('username', '', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
        {{ Form::label('email', '邮件', array('class' => 'control-label')) }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
        {{ Form::label('password', '密码', array('class' => 'control-label')) }}
        {{ Form::password('password', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
        {{ Form::label('password_confirmation', '密码确认') }}
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
          {{ Form::submit('Register', array('class' => 'btn btn-primary btn-lg btn-block')) }}
        </div>

    {{ Form::close() }}
  
  </div>

@stop



