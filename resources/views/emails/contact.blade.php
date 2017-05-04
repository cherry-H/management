@extends('emails.layouts.master')

@section('title')
    Feed Back
@stop

@section('content')
    <h2>You have received a new message from your website contact form.Here are the details:</h2>
    <p>
        Name: <strong>{{ $name }}</strong>
    </p>
    <p>
        Email: <strong>{{ $email }}</strong>
    </p>
    <p>
        Phone: <strong>{{ $phone }}</strong>
    </p>
    <hr>
    <p>
        <br>
        @foreach ($messageLines as $messageLine)
            {{ $messageLine }}<br>
        @endforeach
        <br>
    </p>
    <hr>
    <br>
    <a style="text-decoration: none; background-color: #74cd9e;color: #fff;border-radius: 4px;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height:1.42857143;text-align: center;white-space: nowrap;" target="_blank" href="http://res.lianjia.com:8076/index.php/">Go To Hub</a>
@stop
