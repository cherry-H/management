@extends('emails.layouts.master')

@section('title')
    Below are the issues with deadline within a day
@stop

@section('content')
    @if($tasksWithDeadlineWithinADay)
        <table class="table-responsive table-striped">
            <thead style="color: #afd9ee">
            <tr>
                <th  width="20%">#</th>
                <th  width="50%">Name</th>
                <th  width="30%">Deadline</th>
            </tr>
            </thead>
            <tbody style="color: #bce8f1">
            @foreach($tasksWithDeadlineWithinADay as $tasks)
                <tr>
                    <td><a href="{{URL::to('/api/')}}/task/{{$tasks->id}}">{{$tasks->id}}</a></td>
                    <td><a href="{{URL::to('/api/')}}/task/{{$tasks->id}}">{{$tasks->name}}</a></td>
                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $tasks->due_date)->diffForHumans()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <br><br>
    <a style="text-decoration: none; background-color: #74cd9e;color: #fff;border-radius: 4px;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height:1.42857143;text-align: center;white-space: nowrap;" target="_blank" href="http://res.lianjia.com:8076/index.php/">Go To Hub</a>
@stop

