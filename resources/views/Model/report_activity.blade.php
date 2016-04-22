@extends('admin.layouts.template')
@section('content')
<html>
<head>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
    <title>Activity And Mapping GEActivity</title>
</head>
<body>

<?php
    $dept_data = $admin->department_id;
?>
 <div class="col-lg-12">
 <h3 class="page-header">สรุปรายละเอียดของกิจกรรมของ
<?php 
            if($dept_data == 1){
                echo "ภาควิชาชีววิทยา และสโมสรศึกษา";
            }
            elseif($dept_data == 2){
                echo "ภาควิชาเคมี และสโมสรศึกษา";
            }
            elseif($dept_data == 3){
                echo "ภาควิชาธรณีวิทยา และสโมสรศึกษา";
            }
            elseif($dept_data == 4){
                echo "ภาควิชาฟิกสิกส์และวัสดุศาสตร์ และสโมสรศึกษา";
            }
            elseif($dept_data == 5){
                echo "ภาควิชาเคมีอุตสาหกรรม และสโมสรศึกษา";
            }
            elseif($dept_data == 6){
                echo "ภาควิชาคณิตศาสตร์ และสโมสรศึกษา";
            }
            elseif($dept_data == 7){
                echo "ภาควิชาสถิติ และสโมสรศึกษา";
            }
            elseif($dept_data == 8){
                echo "ภาควิชาวิทยาการคอมพิวเตอร์ และสโมสรศึกษา";
            }
            elseif($dept_data == 9){
                echo "สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม และสโมสรศึกษา";
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

<div class="row">
<input id="filter" type="text" class="form-control" placeholder="ป้อนคำค้นที่ต้องการ">
</div>
<?php 
if($dept_data == 10){
$user = DB::table('activity')->get();
?>
<div class="row">
<table border=0 role="grid" class="searchable">
	<thead>
		
		<th>หมายเหตุ</th>
		<th>ปีการศึกษา</th>
		<th>ชื่อกิจกรรม</th>
		<th>สถานที่จัด</th>
		<th>วันที่จัด(ปี-เดือน-วัน)</th>
		<th>สิ้นสุดวันที่จัด(ปี-เดือน-วัน)</th>
        <th>ภาควิชาหรือสังกัดที่จัด</th>

		

	</thead>

<?php


foreach($user as $user){
	?>
	<tr>
		<td> 
			<?php
				$activity_id = $user->activity_id;
			?>
			<a class="btn btn-default" href="{{ url('detail_act/'.$activity_id) }}" role="button">ดูรายละเอียดของกิจกรรม</a>
        </td>
		<td><?php 	echo $user->a_year; ?></td>
        <td><?php 	echo $user->a_name;?></td>
        <td><?php   echo $user->a_place;?></td>
        <td><?php   echo $user->start_date;?></td>
        <td><?php   echo $user->finish_date;?></td>
        <td>
        <?php   

            if($user->dept_id == 1){
                echo "ภาควิชาชีววิทยา";
            }
            elseif($user->dept_id == 2){
                echo "ภาควิชาเคมี";
            }
            elseif($user->dept_id == 3){
                echo "ภาควิชาธรณีวิทยา";
            }
            elseif($user->dept_id == 4){
                echo "ภาควิชาฟิกสิกส์และวัสดุศาสตร์";
            }
            elseif($user->dept_id == 5){
                echo "ภาควิชาเคมีอุตสาหกรรม";
            }
            elseif($user->dept_id == 6){
                echo "ภาควิชาคณิตศาสตร์";
            }
            elseif($user->dept_id == 7){
                echo "ภาควิชาสถิติ";
            }
            elseif($user->dept_id == 8){
                echo "ภาควิชาวิทยาการคอมพิวเตอร์";
            }
            elseif($user->dept_id == 9){
                echo "สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม";
            }
            elseif($user->dept_id == 10){
                echo "สโมสรนักศึกษา";
            }
            elseif($user->dept_id == 11){
                echo "ชมรมและอื่นๆ";
            }


        ?>

        </td>

	</tr>

<?php
}
?>
	</tr>
</table>
</div>
<?php
}else{
    
    $user = DB::select("SELECT * FROM activity WHERE dept_id = $dept_data or dept_id = 10 or dept_id = 11 ");
?>

<div class="row">
<table border=0 role="grid" class="searchable">
    <thead>
        
        <th>หมายเหตุ</th>
        <th>ปีการศึกษา</th>
        <th>ชื่อกิจกรรม</th>
        <th>สถานที่จัด</th>
        <th>วันที่จัด(ปี-เดือน-วัน)</th>
        <th>สิ้นสุดวันที่จัด(ปี-เดือน-วัน)</th>
        <th>ภาควิชาหรือสังกัดที่จัด</th>

        

    </thead>

<?php


foreach($user as $user){
    ?>
    <tr>
        <td> 
            <?php
                $activity_id = $user->activity_id;
            ?>
            <a class="btn btn-default" href="{{ url('detail_act/'.$activity_id) }}" role="button">ดูรายละเอียดของกิจกรรม</a>
        </td>
        <td><?php   echo $user->a_year; ?></td>
        <td><?php   echo $user->a_name;?></td>
        <td><?php   echo $user->a_place;?></td>
        <td><?php   echo $user->start_date;?></td>
        <td><?php   echo $user->finish_date;?></td>
        <td>
        <?php   

            if($user->dept_id == 1){
                echo "ภาควิชาชีววิทยา";
            }
            elseif($user->dept_id == 2){
                echo "ภาควิชาเคมี";
            }
            elseif($user->dept_id == 3){
                echo "ภาควิชาธรณีวิทยา";
            }
            elseif($user->dept_id == 4){
                echo "ภาควิชาฟิกสิกส์และวัสดุศาสตร์";
            }
            elseif($user->dept_id == 5){
                echo "ภาควิชาเคมีอุตสาหกรรม";
            }
            elseif($user->dept_id == 6){
                echo "ภาควิชาคณิตศาสตร์";
            }
            elseif($user->dept_id == 7){
                echo "ภาควิชาสถิติ";
            }
            elseif($user->dept_id == 8){
                echo "ภาควิชาวิทยาการคอมพิวเตอร์";
            }
            elseif($user->dept_id == 9){
                echo "สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม";
            }
            elseif($user->dept_id == 10){
                echo "สโมสรนักศึกษา";
            }
            elseif($user->dept_id == 11){
                echo "ชมรมและอื่นๆ";
            }


        ?>

        </td>

    </tr>

<?php
}
?>
    </tr>
</table>
</div>

<?php }?>

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