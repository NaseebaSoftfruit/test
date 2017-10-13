@extends('layouts.app')

@section('content')
<form action="add_type" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
   Name: <input type="text" name="name">
    <button>submit</button>

</form>
@endsection