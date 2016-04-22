@extends('admin.layouts.template')
@section('content')

<html>
<head>
	<link rel="stylesheet" href="{{url('foundation/css/foundation.css')}}" />
    <script                 src="{{url('foundation/js/vendor/modernizr.js')}}"></script>
    <script                 src="{{url('jquery-1.12.0.min.js')}}"></script>

	<title>Add Student</title>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>
<body>
	<?php
		if(!isset($msg)){
			$msg="";
		}
	?>
	<?php

    $dept_data = $admin->department_id;

?>

	<form action="{{ url('/add')}}" method="post">
	<fieldset>
    <legend><strong>เพิ่มข้อมูลนักศึกษา</strong></legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	<div class="row">
	    <div class="large-3 columns">
			<label><strong>รหัสนักศึกษา </br>(ตัวอย่าง 550510555)</strong></label>
			<input type="text" name="student_id" pattern="[0-9]*" minlength="9" maxlenght="10" title="กรุณากรอกตัวเลข 10 หลัก"  />
		</div>
	</div>
	
	
	<div class="row">
		<div class="large-3 columns">
			<label><strong>ชื่อ</strong></label>
			<input type="text" name="first_name" >
		</div>
	

	
		<div class="large-3 columns">
		<label><strong>นามสกุล	</strong></label>
		<input type="text" name="last_name" >
		</div>
	
<?php
	$mysqli = new mysqli("localhost", "root", "", "project-2-2015");
	$mysqli->set_charset("utf8");
?>

<?php
    $result_dept = $mysqli->query("SELECT * FROM department");
?>

<?php 
 
 if($dept_data == 10){

 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="student_dept" >
           <?php while ($row = $result_dept->fetch_assoc()) {
              echo"<option value='".$row['dept_id']."' >".$row['dept_name']."</option>";
            }
          ?>
        </select>
    </div>
  	</div>

 	<?php

 }elseif ($dept_data == 8) {
 	?>
 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="student_dept" >
          <option value ="8" >ภาควิชาวิทยาการคอมพิวเตอร์</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 9) {
 	?>
 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="student_dept" >
          <option value ="9" >สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม</option>
        </select>
    </div>
  	</div>

 <?php
 }elseif ($dept_data == 7) {
 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="student_dept" >
          <option value ="7" >ภาควิชาสถิติ</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 6) {
 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="student_dept" >
          <option value ="6" >ภาควิชาคณิตศาสตร์</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 5) {
 	?>
 	
 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="student_dept" >
          <option value ="5" >ภาควิชาเคมีอุตสาหกรรม</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 4) {
 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="student_dept" >
          <option value ="4" >ภาควิชาฟิกสิกส์และวัสดุศาสตร์</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 3) {
 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="student_dept" >
          <option value ="3" >ธรณีวิทยา</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 2) {
 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="student_dept" >
          <option value ="2" >ภาควิชาเคมี</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 1) {
 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="student_dept" >
          <option value ="1" >ภาควิชาชีววิทยา</option>
        </select>
    </div>
  	</div>

 	<?php
 }

?>
    


  	<div class="row">
  		<div class="large-4 columns">
		<label><strong>ปีที่ลงทะเบียน</strong></label>
		<input type="text" name="year_reg" value="0" >
		</div>

		<div class="large-4 columns">
		<label><strong>ภาคการศึกษาที่ลงทะเบียนเรียน(1,2,3)</strong></label>
		<select name="semester_ge" >
          <option value="0" >ยังไม่ได้ลงทะเบียนเรียน</option>
          <option value="1" >1</option>
          <option value="2" >2</option>
          <option value="3" >3</option>
        </select>
		</div>

<?php
    $result_status = $mysqli->query("SELECT * FROM p_status");
?>
		<div class="large-4 columns">
		<label><strong>สถานะ(ผ่าน/ไม่ผ่าน)</strong></label>
		<select name="p_status" >
            <?php while ($row = $result_status->fetch_assoc()) {
              echo"<option value='".$row['p_status_id']."' >".$row['p_status_name']."</option>";
            }
          ?>
        </select>
		</div>

  	</div>	
	
	<div class="row">
	<input type="submit" class="button" value="ตกลง"> <input type="reset"  class="button" value="รีเซ็ต">
	</div>
	</fieldset>
	</form>


<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">Awesome. I have it.</h2>
  <p class="lead">Your couch.  It is mine.</p>
  <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<script type="text/javascript">
	// $(document).ready(function(){
	//   $('#myModal').foundation('reveal', 'open');
	// });

	$(document).ready(function(){
	  <?php if($msg=="error"){?>
	  alert("รหัสนักศึกษา นี้มีอยู่แล้ว");
	  <?php } ?>

	});

</script>




</body>


</html>
@stop