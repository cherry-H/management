@extends('templates.outs.auth')

@section('content')

    <div class="special-form">
        <a href="{{ route('home') }}"></a>
        <h2 class="text-center">Setting Password</h2>
        @if ($errors->first())
            <span class="status-msg error-msg">{{ $errors->first() }}</span>
        @endif
        <hr>
        {!! Form::open(array('method' => "POST",'url' => '/password/reset', $token)) !!}
        <div class="form-group">
            {!! Form::hidden('token', $token) !!}
        </div>
        <div class="form-group">
            <label for="email" class="color-primary">Email:</label>
            {!! Form::text( 'email', null, array('class' => 'form-control', "placeholder" => "Email","autofocus" => "true" )) !!}
        </div>
        <div class="form-group">
            <label for="password" class="color-primary">New Password:</label>
            {!! Form::password('password', array('class' => 'form-control', "placeHolder" => "Password")) !!}
        </div>
        <div class="form-group">
            <label for="password" class="color-primary">Confirm Password:</label>
            {!! Form::password('password_confirmation', array('class' => 'form-control', "placeHolder" => "Password")) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Reset Password', array('class' => 'btn btn-primary btn-wide')) !!}
        </div>
        {!! Form::close() !!}
        <p>
            Check it <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
@stop