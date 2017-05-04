@extends('templates.outs.auth')

@section('content')

    <div class="special-form">
        <a href="{{ route('home') }}">{{--<img src="{{ \App\Helpers\Helpers::logoUrl()  }}" alt="">--}}</a>
        <h2 class="text-center">Contact us</h2>
        @if ($errors->first())
            <span class="status-msg error-msg">{{ $errors->first() }}</span>
        @endif
        <hr>
        {!! Form::open(array('method' => "POST", 'url' => '/contact')) !!}
        {!! Form::hidden('_token', "csrf_token()") !!}
        <div class="form-group">
            <label for="name" class="color-primary">Full Name:</label>
            {!! Form::text('name', null, array('class' => 'form-control', "placeholder" => "Full name", "autofocus" => "true" )) !!}
        </div>
        <div class="form-group">
            <label for="email" class="color-primary">Email:</label>
            {!! Form::text( 'email', null, array('class' => 'form-control', "placeholder" => "Email","autofocus" => "true" )) !!}
        </div>
        <div class="form-group">
            <label for="phone" class="color-primary">Phone No:</label>
            {!! Form::text('phone', null, array('class' => 'form-control', "placeholder" => "Phone No", "autofocus" => "true" )) !!}
        </div>
        <div class="form-group">
            <label for="message" class="color-primary">Message:</label>
            {!! Form::textarea('message', null, array('class' => 'form-control', 'size' => "30x4", "placeholder" => "Message", "autofocus" => "true" )) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Send', array('class' => 'btn btn-primary btn-wide')) !!}
        </div>
        {!! Form::close() !!}
        <p>
            <h6>
            Fill out the form below to send me a message and I will try to get back to you within 24 hours!
            </h6>
        </p>
    </div>

@stop

