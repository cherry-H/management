@extends('templates.outs.auth')

@section('content')

    <div class="special-form">
        <a href="{{ route('home') }}" style="color: #EEEEEE"><h3 class="text-center">SEND EMAIL SUCCESS</h3></a>
        @if ($errors->first())
            <span class="status-msg error-msg">{{ $errors->first() }}</span>
        @endif
        <hr>
        <p>
            Please check the email. OR <a href="{{ route('backHome') }}">Click here to return to</a>
        </p>
    </div>

@stop

