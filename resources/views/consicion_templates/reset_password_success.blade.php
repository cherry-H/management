@extends('templates.outs.auth')

@section('content')

    <div class="special-form">
        <a href="{{ route('home') }}">{{--<img src="{{ \App\Helpers\Helpers::logoUrl()  }}" alt="">--}}</a>
        <h1 class="text-center">RESET PASSWORD SUCCESS</h1>
        @if ($errors->first())
            <span class="status-msg error-msg">{{ $errors->first() }}</span>
        @endif
        <hr>
        <p>
            Click here to return to <a href="{{ route('login') }}">login</a>
        </p>
    </div>

@stop

