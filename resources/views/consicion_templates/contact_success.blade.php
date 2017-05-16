@extends('templates.outs.auth')

@section('content')

    <div class="special-form">
        <a href="{{ route('home') }}" style="color: #EEEEEE"><h3 class="text-center">Thank you for feedback.</h3></a>
        @if ($errors->first())
            <span class="status-msg error-msg">{{ $errors->first() }}</span>
        @endif
        <hr>
        <p>
            <br>
            We have received your E-mail, please wait patiently and contact you later.
        </p>
        <p>
            <a href="{{ route('backHome') }}">Click here to return to</a>
        </p>
    </div>
@stop

