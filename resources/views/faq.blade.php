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

    {{-- SKYLINE --}}
    <div class="hug hug-skyline">
        <div class="skyline"></div>
    </div>

    {{-- FEATURES --}}
    <div class="hug hug-features">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="text-center">System comes full of delightful features!</h2>
                </div>
                <div class="col-xs-12 col-md-3 feature">
                    <i class="ion-ios-person-outline"></i>
                    <h3>clients</h3>
                    <p>Manage unlimited amount of clients. Add additional information for each client
                        such as, contact person, email, and phone number.</p>
                </div>
                <div class="col-xs-12 col-md-3 feature">
                    <i class="ion-ios-box-outline"></i>
                    <h3>projects</h3>
                    <p>Create projects that are connected to clients. Projects are displayed
                        in an agile format and have special sections to store project based
                        credentials.</p>
                </div>
                <div class="col-xs-12 col-md-3 feature">
                    <i class="ion-ios-checkmark-outline"></i>
                    <h3>tasks</h3>
                    <p>Create an unlimited amount of tasks for any project. Push them across
                        the scrum board and assign weights and priority per task.</p>
                </div>
                <div class="col-xs-12 col-md-3 feature">
                    <i class="ion-ios-gear-outline"></i>
                    <h3>weights</h3>
                    <p>Each task has a weight number, the bigger the weight the harder the task
                        is to complete. This allows you to keep track on how big a project really is. Pretty handy stuff.</p>
                </div>
                <div>
                    <div class="col-xs-12 col-md-3 feature centered">
                        <i class="ion-ios-people-outline"></i>
                        <h3>project sharing <span class="new">new!</span></h3>
                        <p>Share your projects with multiples users and collaborate together on your projects.</p>
                    </div>
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
            </div>
        </div>
    </div>
@stop