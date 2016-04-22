@extends('admin.layouts.template')
@section('content')
<div class="row">
 <div class="col-lg-12">
 <h5 class="page-header"><?php

	$id_data   			= $admin->id;
    $first_data 		= $admin->first_name;
    $last_data 			= $admin->last_name;
    $dept_data 			= $admin->department_id;
    $username_data   	= $admin->username;
    $password_data   	= $admin->password;
    $remember_token_data= $admin->remember_token;
    $created_at_data   	= $admin->created_at;
    $updated_at_data   	= $admin->updated_at;

    echo "ทำรายการสำเร็จ";
    ?>

 </h5>
  
 </div>
 <a  href="{{url('admin/index')}}">กดเพื่อยืนยัน</a>
 <!-- /.col-lg-12 -->
</div>
@stop
