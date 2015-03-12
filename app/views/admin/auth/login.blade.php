@extends('l.index')

@section('container')

  <div id="login" class="login">

    {{ Form::open(array('url' => 'admin/login', 'class' => 'am-form')) }}
        @if ($errors->has('login'))
          <div class="form-group has-error">
              <label for="inputError" class="control-label">{{ $errors->first('login', ':message') }}</label>
          </div>
        @endif

        <div class="form-group">
        {{ Form::label('email', '邮件', array('class' => 'control-label')) }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
        {{ Form::label('password', '密码', array('class' => 'control-label')) }}
        {{ Form::password('password', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
          {{ Form::submit('login', array('class' => 'btn btn-primary btn-lg btn-block')) }}
        </div>

    {{ Form::close() }}
  
  </div>

@stop



