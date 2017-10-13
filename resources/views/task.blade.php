@extends('layouts.app')

@section('content')
<div class="container">
 {{--   @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
--}}
    <a href="addType">ADD Type</a>
    <form action="assignTask" method="post" class="form-inline">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group col-md-2">
            <label >Users</label>
            <select id = "myList" name="user_id">
                @foreach($user as $value)
                    <option value = {{$value->id}}>{{$value->name}}</option>
               @endforeach
            </select>
        </div>

        <div class="form-group col-md-2">
            <label >Task Type</label>
            <select id = "myList" name="type_id">

                @foreach($task as $value)
                    <option value = {{$value->id}}>{{$value->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-2">
            Due Date: <input type="text" name="due_date" class="form-control">
        </div>

        <div class="form-group col-md-2">
            Time: <input type="text" name="time" class="form-control">
        </div>

        <div class="form-group col-md-2">
            Subject: <input type="text" name="subject" class="form-control">
        </div>

        <div class="form-group col-md-2">
            Message: <input type="text"name="message" class="form-control">
        </div>
        <input type="hidden" name="status" value="1">
        <div class="form-group col-md-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
    </div>

@endsection