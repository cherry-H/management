@extends('emails.layouts.master')

@section('title')
    Find Password
@stop

@section('content')
    I hope that system makes managing your project easier and
    simpler. Please enjoy this project but more importantly help out by pointing out things that can be refined or added while in beta, so that can
    be something everyone loves.
    <br><br>
    <a style="text-decoration: none; background-color: #74cd9e;color: #fff;border-radius: 4px;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height:1.42857143;text-align: center;white-space: nowrap;" target="_blank" href={{ url('password/reset/'.$token) }}>Setting Password</a>
@stop