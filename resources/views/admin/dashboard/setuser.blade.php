@extends('admin.layouts.template')
@section('content')

<?php

	$id_data   			= $admin->id;
    $first_data 		= $admin->first_name;
    $last_data 			= $admin->last_name;
    $dept_data 			= $admin->department_id;
    $username_data   	= $admin->username;
    $password_data   	= $admin->password;
    $remember_token_data= $admin->remember_token;
    $created_at_data   	= $admin->created_at;
    $updated_at_data   	= $admin->updated_at;


 /*   echo "$id_data";
     echo "$first_data";
     echo "$last_data";
     echo "$dept_data";
     echo "$username_data";
     echo "$password_data";
     echo "$remember_token_data";
     echo "$created_at_data";
     echo "$updated_at_data";*/
?>
<div class="col-md-4 col-md-offset-4">
 <div class="login-panel panel panel-default">
<div class="row">
 <div class="col-lg-12">
 <h3 class="page-header">ตั้งค่าบัญชีผู้ใช้งาน</h3>
 </div>

<form action="{{ url('edituser')}}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
	<div>
        ชื่อ
        <input type="text" name="first_name" value="<?php echo"$first_data"; ?>">
    </div>
    <div>
        นามสกุล
        <input type="text" name="last_name" value="<?php echo"$last_data"; ?>">
    </div>


<?php

	$id_data   			= $admin->id;
    $dept_data 			= $admin->department_id;
    $username_data   	= $admin->username;
    $password_data   	= $admin->password;
    $remember_token_data= $admin->remember_token;
    $created_at_data   	= $admin->created_at;
    $updated_at_data   	= $admin->updated_at;
?>
    <div>
        <button type="submit">ยืนยัน</button>
    </div>



</form>
</div>




</div>
</div>
@stop
