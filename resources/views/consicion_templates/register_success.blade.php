@extends('templates.outs.auth')

@section('content')

    <div class="special-form">
        <a href="{{ route('home') }}">{{--<img src="{{ \App\Helpers\Helpers::logoUrl()  }}" alt="">--}}</a>
        <h1 class="text-center">REGISTER SUCCESS</h1>
        @if ($errors->first())
            <span class="status-msg error-msg">{{ $errors->first() }}</span>
        @endif
        <hr>
        <p>
            Please check the email. And <a href="{{ route('backHome') }}">Click here to return to</a>
        </p>
    </div>

@stop

