@extends('templates.outs.auth')

@section('content')

  <div class="special-form">
      <a href="{{ route('home') }}" style="color: #EEEEEE"><h3 class="text-center">LOGIN</h3></a>
      @if ($errors->first())
          <span class="status-msg error-msg">{{ $errors->first() }}</span>
      @endif
      <hr>
    {!! Form::open(array('action' => 'UsersController@login')) !!}
        <div class="form-group">
            <label for="email" class="color-primary">Email:</label>
            {!! Form::text( 'email', null, array('class' => 'form-control', "placeholder" => "Email","autofocus" => "true" )) !!}
        </div>
        <div class="form-group">
            <label for="password" class="color-primary">Password:</label>
            {!! Form::password( 'password', array('class' => 'form-control', "placeholder" => "Password" )) !!}
        </div>
        {!! Geetest::render() !!}<br>
        {!! Form::checkbox("remember", "remember me") !!}<strong> Remember Me</strong>
        <br>
        <div class="form-group">
            {!! Form::submit( 'Login', array('class' => 'btn btn-primary btn-wide')) !!}
        </div>
    {!! Form::close() !!}
    <p>
        Don't have an account? <a href="{{ route('register') }}">register</a>
        OR   <a href="{{ url('/password/email') }}">Forgot Your Password?</a>
    </p>
  </div>

@stop