@extends('template_no_sidebar_no_navbar')

@section('content')
<div class="col-md-4 col-md-offset-4">
 <div class="login-panel panel panel-default">
 <div class="panel-heading">
 <h2 class="panel-title"><h3><strong>ลงทะเบียน</strong></h3></h2>
 </div>
 @if(Session::has('message'))
 <div class="panel-body bg-danger color-red">
 {{Session::get('message')}}
 </div>
 @endif
<div class="panel-body">
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
        ชื่อ
        <input type="text" name="first_name" value="{{ old('first_name') }}">
    </div>
    <div>
        นามสกุล
        <input type="text" name="last_name" value="{{ old('last_name') }}">
    </div>

<?php
    $mysqli = new mysqli("localhost", "root", "", "project-2-2015");
    $mysqli->set_charset("utf8");

    $result_dept = $mysqli->query("SELECT * FROM department");
?>

    <div>
        ภาควิชา/สังกัด
        <select name="department_id" >
           <?php while ($row = $result_dept->fetch_assoc()) {
              echo"<option value='".$row['dept_id']."' >".$row['dept_name']."</option>";
            }
          ?>
        </select>
        <!-- <input type="number" name="department_id" > -->
    </div>

    <div>
        ชื่อผู้เข้าใช้
        <input type="text" name="username" value="{{ old('username') }}">
    </div>

    <div>
        รหัสผ่าน (ไม่ต่ำกว่า 6 ตัว)
        <input type="password" name="password">
    </div>

    <div>
        ยืนยันรหัสผ่านอีกครั้ง
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">ยืนยัน</button>
    </div>
    <p>
        <div>
            <a href="{{url('admin/login')}}"><< กลับไปยังหน้าเข้าสู่ระบบ</a>
            <p>
        </div>
</form>
</div>

</div>
</div>
@stop