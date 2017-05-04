@extends('templates.outs.home')

@section('content')
    {{-- HEADER--}}
    <div class="hug hug-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ route('home') }}" class="pull-left">{{--<img src="{{ \App\Helpers\Helpers::logoUrl() }}" alt="Ribbbon">--}}<h1>Welcome</h1></a>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-line pull-right login">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-line pull-right register">Register</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- HEREO SECTION --}}
    <div class="hug hug-hero">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="left-side">
                        <h1>Introducing Management.</h1>
                        <h2>An project management system help improve effect.</h2>
                        <a href="{{ route('register') }}" class="btn btn-special">GET STARTED</a>
                    </div>
                    <div class="right-side">
                        {{--<img class="mascot" src="{{ asset('assets/img/mascot_left.png')  }}" alt="">--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- footer --}}
    <div class="hug hug-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <hr class="special">
                    <p class="text-center last-line">Copyright {{ date("Y") }} &copy;  HXY
                        | <a href="{{ route('contact') }}">Contect us</a>
                        | <a href="{{ route('faq') }}">F.A.Q</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop