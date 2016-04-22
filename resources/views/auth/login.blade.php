@extends('template_no_sidebar_no_navbar')

@section('content')
 <div class="col-md-4 col-md-offset-4">
 <div class="login-panel panel panel-default">
 <div class="panel-heading">
 <h2 class="panel-title"><h3><strong>เข้าสู่ระบบ</strong></h3></h2>
 </div>
 @if(Session::has('message'))
 <div class="panel-body bg-danger color-red">
 {{Session::get('message')}}
 </div>
 @endif
<div class="panel-body">
    <form method="POST" action="{{url('admin/login')}}">
        {!! csrf_field() !!}

        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div>
             <label><strong>Username</strong></label>   
            <input type="text" name="username" value="{{ old('username') }}">
            
        </div>

        <div>
            <label><strong>Password</strong></label>
            <input type="password" name="password" id="password">
        </div>

        <div>
            <input type="checkbox" name="remember"> <label><h8>Remember Me</h8></label>
        </div>

        <div>
            <a href="{{url('admin/register')}}"> ลงทะเบียน</a>
            <p>
        </div>

        <div>
            <button type="submit">ตกลง</button>
        </div>
    </form>
</div>

</div>
</div>

@stop