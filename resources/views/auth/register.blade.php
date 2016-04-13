@extends('template_no_sidebar_no_navbar')

@section('content')
<form method="POST" action="{{url('admin/register')}}">
    {!! csrf_field() !!}

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div>
        First Name
        <input type="text" name="first_name" value="{{ old('first_name') }}">
    </div>
    <div>
        Last Name
        <input type="text" name="last_name" value="{{ old('last_name') }}">
    </div>

    <div>
        Department ID
        <input type="number" name="department_id" >
    </div>

    <div>
        Username
        <input type="text" name="username" value="{{ old('username') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>
@stop