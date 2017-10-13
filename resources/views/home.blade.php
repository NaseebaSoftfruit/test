@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->user_type === 'admin')
                        <a href="addTask">Assign Task</a>
                    @else
                    You are Logged  in

                    @endif



                            <p><u>Upcoming task</u></p>
                        @foreach($task as $values)
                        @if( date('y-m-d')>$values->due_date )

                                Task Name:{{$values['type']->name}} <br>
                                    Due Date :{{$values->due_date}}  <br>
                                    Subject:{{$values->subject}}   <br>
                            @endif
                            <hr>
                        @endforeach
                        <p><u>Due Task</p></u>
                    @foreach($task as $values)

                        @if(date('y-m-d')<$values->due_date)
                                    Task Name:{{$values['type']->name}} <br>
                                    Due Date :{{$values->due_date}}  <br>
                                    Subject:{{$values->subject}}   <br>
                            @endif
                            <hr>
                        @endforeach
                        <p><u>Today Task</u></p>
                    @foreach($task as $values)

                        @if(date('y-m-d') ==$values->due_date)
                                    Task Name:{{$values['type']->name}} <br>
                                    Due Date :{{$values->due_date}}  <br>
                                    Subject:{{$values->subject}}  <br>
                                <hr>
                                @endif

                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
