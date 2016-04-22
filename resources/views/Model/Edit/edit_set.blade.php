@extends('admin.layouts.template')
@section('content')
<html>
<head>

	<title>Edit Setting</title>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
	
</head>
<body>

<?php
		$year   			= $fac_data['year'];
		$fac_hr				= $fac_data['fac_hr'];
		$dept_hr			= $fac_data['dept_hr'];
		$club_hr			= $fac_data['club_hr'];
?>

	<form action="{{ url('/setedit')}}" method="post">
	<fieldset>
    <legend>แก้ไขชั่วโมงกิจกรรมของคณะวิทยาศาสตร์</legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	<div class="row">
	    <div class="large-2 columns">
			<label>ปีการศึกษา</label>
			<input type="text" name="year" value="<?php echo"$year"; ?>" readonly >
		</div>
	</div>
	
	<div class="row">
		<div class="large-2 columns">
			<label>จำนวนชั่วโมงของ</br>คณะวิทยาศาสตร์</label>
			<input type="text" name="fac_hr"  value="<?php echo"$fac_hr"; ?>" >
			
		</div>
	</div>

	<div class="row">
		<div class="large-2 columns">
			<label>จำนวนชั่วโมงของ</br>ภาควิชา</label>
			<input type="text" name="dept_hr"  value="<?php echo"$dept_hr"; ?>" >
			
		</div>
	</div>

	<div class="row">
		<div class="large-2 columns">
			<label>จำนวนชั่วโมงของ</br>ชมรมและอื่นๆ</label>
			<input type="text" name="club_hr"  value="<?php echo"$club_hr"; ?>" >
			
		</div>
	</div>

	
	<div class="row">
	<input type="submit" class="button" value="ตกลง" > <input type="reset"  class="button" value="ยกเลิก">
	</div>
	</fieldset>
	</form>






</body>


</html>
@stop