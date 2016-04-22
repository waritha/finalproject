@extends('admin.layouts.template')
@section('content')
<html>
<head>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
    <title>Participation</title>

</head>
<body>
<?php
    $dept_data = $admin->department_id;
?>



 <div class="col-lg-12">
 <h3 class="page-header">ลงชื่อทำกิจกรรม 

    <?php 
if($dept_data == 1){
                echo "ภาควิชาชีววิทยา";
            }
            elseif($dept_data == 2){
                echo "ภาควิชาเคมี";
            }
            elseif($dept_data == 3){
                echo "ภาควิชาธรณีวิทยา";
            }
            elseif($dept_data == 4){
                echo "ภาควิชาฟิกสิกส์และวัสดุศาสตร์";
            }
            elseif($dept_data == 5){
                echo "ภาควิชาเคมีอุตสาหกรรม";
            }
            elseif($dept_data == 6){
                echo "ภาควิชาคณิตศาสตร์";
            }
            elseif($dept_data == 7){
                echo "ภาควิชาสถิติ";
            }
            elseif($dept_data == 8){
                echo "ภาควิชาวิทยาการคอมพิวเตอร์";
            }
            elseif($dept_data == 9){
                echo "สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม";
            }
            elseif($dept_data == 10){
                echo "สโมสรนักศึกษา";
            }
            elseif($dept_data == 11){
                echo "ชมรมและอื่นๆ";
            }
?>

 </h3>
 </div>


	<fieldset>
	<div class="row">
<input id="filter" type="text" class="form-control" placeholder="ป้อนคำค้นที่ต้องการ">
</div>


<?php
if($dept_data == 10){
$users = DB::table('activity')->orderBy('start_date', 'desc')->get();
?>

<div class="row">
<table border=0 role="grid" class="searchable">
<b>ตารางสำหรับเลือกกิจกรรมจริงเพื่อลงชื่อการเข้าร่วมกิจกรรม</b>
	<thead>
		
		<th>หมายเหตุ</th>
		<th>ปีการศึกษา</th>
		<th>ชื่อกิจกรรม</th>
		<th>สถานที่จัด</th>
		<th>วันที่จัด(ปี-เดือน-วัน)</th>
		<th>สิ้นสุดวันที่จัด(ปี-เดือน-วัน)</th>
        <th>ลงชื่อเข้าร่วม</th>
		

	</thead>




<?php


foreach($users as $user){
	?>
	<tr>
		<td> 
			<?php
				$activity_id = $user->activity_id;
			?>
           
            <a class="btn btn-default" href="{{ url('viewdetail/'.$activity_id) }}" role="button">ดูรายละเอียดผู้เข้าร่วม</a>
            
			</td>
		<td><?php 	echo $user->a_year; ?></td>
        <td><?php 	echo $user->a_name;?></td>
        <td><?php   echo $user->a_place;?></td>
        <td><?php   echo $user->start_date;?></td>
        <td><?php   echo $user->finish_date;?></td>
        <td>
            <!-- เพิ่มทีละคนแบบธรรมดา
            <a class="btn btn-default" href="{{ url('partselect/'.$activity_id) }}" role="button">รายคน</a> -->
          <!--   เพิ่มทีละคนแบบ jquery และยืนยันก่อนบันทึกจริง -->
            <a class="btn btn-default" href="{{ url('part_one/'.$activity_id) }}" role="button">ลงชื่อเข้าร่วมแบบรายบุคคล</a>
        <!--    <input type="checkbox" value="<?=$activity_id ?>" name="activity_id[]"> -->
            <!-- <a class="btn btn-default" href="{{ url('admin/partexcel/'.$activity_id) }}" role="button">โหลดจากไฟล์เอ็กเซล</a> -->


        </td>

         <?php  /*var_dump($user->name_title);
           var_dump($user->firstname);
           var_dump($user->lastname);
           var_dump($user->year);
           var_dump($user->year_reg);
           var_dump($user->semester_ge);
           var_dump($user->p_status);
		*/
    
    /* $table -> integer('activity_id',2); 
        $table -> char('a_year', 4); 
        $table -> string('a_name' , 50); 
        $table -> string('a_place' , 40); 
        $table -> date('start_date'); 
        $table -> date('finish_date'); 
        $table -> char('dept_id' , 3); */
 	?>
	</tr>

<?php
}
?>
	</tr>
</table>
<a href="{{ url('admin/partexcel') }}" class="btn btn-default"  role="button">โหลดรายชื่อผู้เข้าร่วมจากไฟล์เอ็กเซล</a>


</div>

<?php
}else{


$users = DB::select("SELECT * FROM activity WHERE dept_id = $dept_data or dept_id = 10 or dept_id = 11 ");

    ?>
<div class="row">
<table border=0 role="grid" class="searchable">
<b>ตารางสำหรับเลือกกิจกรรมจริงเพื่อลงชื่อการเข้าร่วมกิจกรรม</b>
    <thead>
        
        <th>หมายเหตุ</th>
        <th>ปีการศึกษา</th>
        <th>ชื่อกิจกรรม</th>
        <th>สถานที่จัด</th>
        <th>วันที่จัด(ปี-เดือน-วัน)</th>
        <th>สิ้นสุดวันที่จัด(ปี-เดือน-วัน)</th>
        <th>ลงชื่อเข้าร่วม</th>
        

    </thead>




<?php


foreach($users as $user){
    ?>
    <tr>
        <td> 
            <?php
                $activity_id = $user->activity_id;
            ?>
           
            <a class="btn btn-default" href="{{ url('viewdetail/'.$activity_id) }}" role="button">ดูรายละเอียดผู้เข้าร่วม</a>
            
            </td>
        <td><?php   echo $user->a_year; ?></td>
        <td><?php   echo $user->a_name;?></td>
        <td><?php   echo $user->a_place;?></td>
        <td><?php   echo $user->start_date;?></td>
        <td><?php   echo $user->finish_date;?></td>
        <td>
            <!-- เพิ่มทีละคนแบบธรรมดา
            <a class="btn btn-default" href="{{ url('partselect/'.$activity_id) }}" role="button">รายคน</a> -->
          <!--   เพิ่มทีละคนแบบ jquery และยืนยันก่อนบันทึกจริง -->
            <a class="btn btn-default" href="{{ url('part_one/'.$activity_id) }}" role="button">ลงชื่อเข้าร่วมแบบรายบุคคล</a>
        <!--    <input type="checkbox" value="<?=$activity_id ?>" name="activity_id[]"> -->
            <!-- <a class="btn btn-default" href="{{ url('admin/partexcel/'.$activity_id) }}" role="button">โหลดจากไฟล์เอ็กเซล</a> -->


        </td>

         <?php  /*var_dump($user->name_title);
           var_dump($user->firstname);
           var_dump($user->lastname);
           var_dump($user->year);
           var_dump($user->year_reg);
           var_dump($user->semester_ge);
           var_dump($user->p_status);
        */
    
    /* $table -> integer('activity_id',2); 
        $table -> char('a_year', 4); 
        $table -> string('a_name' , 50); 
        $table -> string('a_place' , 40); 
        $table -> date('start_date'); 
        $table -> date('finish_date'); 
        $table -> char('dept_id' , 3); */
    ?>
    </tr>

<?php
}
?>
    </tr>
</table>
<a href="{{ url('admin/partexcel') }}" class="btn btn-default"  role="button">โหลดรายชื่อผู้เข้าร่วมจากไฟล์เอ็กเซล</a>


</div>
<?php } 

?>

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

	



</body>
@stop