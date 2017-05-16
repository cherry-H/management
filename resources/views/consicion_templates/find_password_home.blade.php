@extends('templates.outs.auth')

@section('content')

    <div class="special-form">
        <a href="{{ route('home') }}" style="color: #EEEEEE"><h3 class="text-center">FIND PASSWORD</h3></a>
        @if ($errors->first())
            <span class="status-msg error-msg">{{ $errors->first() }}</span>
        @endif
        <hr>
        {!! Form::open(array('method' => "POST", 'url' => '/password/email')) !!}
        <div class="form-group">
            <label for="email" class="color-primary">Email:</label>
            {!! Form::text( 'email', null, array('class' => 'form-control', "placeholder" => "Email","autofocus" => "true" )) !!}
        </div>
        <div class="form-group">
            <label for="fullName" class="color-primary">Full Name:</label>
            {!! Form::text('fullName', null, array('class' => 'form-control', "placeholder" => "Full name", "autofocus" => "true" )) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Send Password Reset Link', array('class' => 'btn btn-primary btn-wide')) !!}
        </div>
        {!! Form::close() !!}
        <p>
            Please check the email.
        </p>
    </div>

@stop

