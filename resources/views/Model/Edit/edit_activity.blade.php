@extends('admin.layouts.template')
@section('content')
<html>
<head>

	<title>Edit GEActivity</title>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>

<?php 

       /* echo "$year";*/
        $dept_data = $admin->department_id;
        /*echo "$dept_data";*/
?>
<body>

<?php
		$activity_id   	 = $act_data['activity_id'];
		$a_name   		 = $act_data['a_name'];
		$a_year    		 = $act_data['a_year'];
		$a_place    	 = $act_data['a_place'];
		$start_date      = $act_data['start_date'];
		$finish_date     = $act_data['finish_date'];
		$dept_id         = $act_data['dept_id'];

/* $table -> integer('activity_id',2); 
        $table -> char('a_year', 4); 
        $table -> string('a_name' , 50); 
        $table -> string('a_place' , 40); 
        $table -> date('start_date'); 
        $table -> date('finish_date'); 
        $table -> char('dept_id' , 3); 

 value="<?php echo"$activity_id"; ?>" readonly  
        */

?>

	<form action="{{ url('/editact')}}" method="post">
	<fieldset>
    <legend>แก้ไขข้อมูลกิจกรรม</legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
	 <div class="row">
		<div class="large-3 columns">
			<label>รหัสกิจกรรม</label>
			<input type="text" name="activity_id" value="<?php echo"$activity_id"; ?>" readonly  >
		</div>
	</div>

	<div class="row">
	    <div class="large-2 columns">
			<label>ปีการศึกษา</label>
			<input type="text" name="a_year" pattern="[0-9]*" maxlenght="4" title="กรุณากรอกปี พ.ศ." value="<?php echo"$a_year"; ?>" />
		</div>
	
		<div class="large-3 columns">
			<label>ชื่อกิจกรรม</label>
			<input type="text" name="a_name" value="<?php echo"$a_name"; ?>" >
		</div>
	
		<div class="large-3 columns">
			<label>สถานที่จัด</label>
			<input type="text" name="a_place" value="<?php echo"$a_place"; ?>" >
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
  	

 	<?php
 }

?>



	</div>

	<div class="row">
		<div class="large-3 columns">
		<label>วันที่จัด (ปี-เดือน-วัน)</label>	
		<input type="date" name="start_date" value="<?php echo"$start_date"; ?>" >
			
		</div>
	</div>

	<div class="row">
		<div class="large-3 columns">
		<label>สิ้นสุดวันที่จัด  (ปี-เดือน-วัน)</label>	
		<input type="date" name="finish_date" value="<?php echo"$finish_date"; ?>" >
			
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
						if(db::select("SELECT * FROM mapping_ge_activity where ge_id='$ge_id' and activity_id='$activity_id'"))
						{
							$cc=1;
						}else{
							$cc=0;
						}
					?>
					<input type="checkbox" value=<?php echo "$ge_id" ?> name="ge[]" <?php if($cc==1) echo "checked"; ?>> <?php echo $ge_id; ?>
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