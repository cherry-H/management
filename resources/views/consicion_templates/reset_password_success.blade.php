@extends('templates.outs.auth')

@section('content')

    <div class="special-form">
        <a href="{{ route('home') }}"><h3 class="text-center">RESET PASSWORD SUCCESS</h3></a>
        @if ($errors->first())
            <span class="status-msg error-msg">{{ $errors->first() }}</span>
        @endif
        <hr>
        <p>
            Click here to return to <a href="{{ route('login') }}">login</a>
        </p>
    </div>

@stop

