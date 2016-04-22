@extends('admin.layouts.template')
@section('content')

<html>
<head>

	<title>Add Activity And Mapping GEActivity</title>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>

<?php 

       /* echo "$year";*/
        $dept_data = $admin->department_id;
        /*echo "$dept_data";*/
?>
<body>

	<form action="{{ url('/addact')}}" method="post">
	<fieldset>
    <legend>เพิ่มข้อมูลกิจกรรม</legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	<div class="row">
	    <div class="large-2 columns">
			<label><strong>ปีการศึกษา</strong></label>
			<input type="text" name="a_year" pattern="[0-9]*" maxlenght="4" title="กรุณากรอกปี พ.ศ."  />
		</div>
	
		<div class="large-3 columns">
			<label><strong>ชื่อกิจกรรม</strong></label>
			<input type="text" name="a_name" >
		</div>
	
		<div class="large-3 columns">
			<label><strong>สถานที่จัด</strong></label>
			<input type="text" name="a_place" >
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
			<label><strong>ภาควิชาที่จัดกิจกรรม</strong></label>
			<select name="dept_id" >
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
        <select name="dept_id" >
          <option value ="8" >ภาควิชาวิทยาการคอมพิวเตอร์</option>
          <option value ="10" >สโมสรนักศึกษา</option>
          <option value ="11" >ชมรมและอื่นๆ</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 9) {
 	?>
 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="dept_id" >
          <option value ="9" >สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม</option>
          <option value ="10" >สโมสรนักศึกษา</option>
          <option value ="11" >ชมรมและอื่นๆ</option>
        </select>
    </div>
  	</div>

 <?php
 }elseif ($dept_data == 7) {
 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="dept_id" >
          <option value ="7" >ภาควิชาสถิติ</option>
          <option value ="10" >สโมสรนักศึกษา</option>
          <option value ="11" >ชมรมและอื่นๆ</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 6) {
 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="dept_id" >
          <option value ="6" >ภาควิชาคณิตศาสตร์</option>
          <option value ="10" >สโมสรนักศึกษา</option>
          <option value ="11" >ชมรมและอื่นๆ</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 5) {
 	?>
 	
 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="dept_id" >
          <option value ="5" >ภาควิชาเคมีอุตสาหกรรม</option>
          <option value ="10" >สโมสรนักศึกษา</option>
          <option value ="11" >ชมรมและอื่นๆ</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 4) {
 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="dept_id" >
          <option value ="4" >ภาควิชาฟิกสิกส์และวัสดุศาสตร์</option>
          <option value ="10" >สโมสรนักศึกษา</option>
          <option value ="11" >ชมรมและอื่นๆ</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 3) {
 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="dept_id" >
          <option value ="3" >ธรณีวิทยา</option>
          <option value ="10" >สโมสรนักศึกษา</option>
          <option value ="11" >ชมรมและอื่นๆ</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 2) {
 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="dept_id" >
          <option value ="2" >ภาควิชาเคมี</option>
          <option value ="10" >สโมสรนักศึกษา</option>
          <option value ="11" >ชมรมและอื่นๆ</option>
        </select>
    </div>
  	</div>

 	<?php
 }elseif ($dept_data == 1) {
 	?>

 	<div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="dept_id" >
          <option value ="1" >ภาควิชาชีววิทยา</option>
          <option value ="10" >สโมสรนักศึกษา</option>
          <option value ="11" >ชมรมและอื่นๆ</option>
        </select>
    </div>
  	</div>

 	<?php
 }

?>


	<div class="row">
		<div class="large-3 columns">
		<label><strong>วันที่จัด (ปี-เดือน-วัน)</strong></label>	
		<input type="date" name="start_date" >
			
		</div>
	</div>

	<div class="row">
		<div class="large-3 columns">
		<label><strong>สิ้นสุดวันที่จัด  (ปี-เดือน-วัน)</strong></label>	
		<input type="date" name="finish_date" >
			
		</div>
	</div>

	
	<div class="row">
	<input type="submit" class="button" value="ตกลง" > <input type="reset"  class="button" value="รีเซ็ต">
	</div>
	</fieldset>


	<fieldset>
    <legend>ตารางแสดงรายละเอียดข้อมูลกิจกรรม GE</legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	 <div class="row">
	 	<div class="large-3 columns">
	<input id="filter" type="text" class="form-control" placeholder="ป้อนคำค้นที่ต้องการ">
		</div>
	</div>

	<div class="row">
	    <table border=0 role="grid" class="searchable" >
			<thead>
				<th>เลือก</th>
				<th>ปีการศึกษา</th>
				<th>ชื่อกิจกรรม</th>
				<th>ชั่วโมงกิจกรรม</th>
				<th>ประเภทกิจกรรม</th>


			</thead>

		<?php

		$users = DB::select("SELECT * FROM ge_activity");
		foreach($users as $user){
			?>
			<tr>
				<td> 
					<?php
						$ge_id = $user->ge_id;
					?>
					<input type="checkbox" value="<?=$ge_id ?>" name="ge[]">
				</td>
				<td><?php echo $user->ge_year; ?></td>
		        <td><?php echo $user->ge_name;?></td>
		        <td><?php   echo $user->ge_hour;?></td>
		        <td>
		         <?php   
		          if($user->ge_category == 1){
		            echo "กิจกรรมบังคับเข้าร่วม";
		          }
		            elseif($user->ge_category == 2){
		                echo "กิจกรรมเลือกเข้าร่วม";
		            } 
		          elseif($user->ge_category == 3){
		            echo "กิจกรรมของชมรมและอื่นๆ";
		          }
		          ?>
		        </td>
		        

		         <?php 
		 	?>
			</tr>

		<?php
		}
		?>
			</tr>
		</table>
	</div>
	</fieldset>


	</form>









</body>


</html>
<script type="text/javascript">
$(document).ready(function () {

    (function ($) {

        $('#filter').keyup(function () {
        	console.log("xx");
            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));
});</script>
@stop