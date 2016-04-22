@extends('admin.layouts.template')
@section('content')
<html>
<head>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>
<body>

<?php
    $dept_data = $admin->department_id;
    /*echo "$dept_data";*/
?>

 <div class="col-lg-12">
 <h3 class="page-header">สรุปรายละเอียดของนักศึกษา 
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


<div class="row">
<input id="filter" type="text" class="form-control" placeholder="ป้อนคำค้นที่ต้องการ">
</div>
<?php 
if($dept_data == 10){
$users = DB::table('student')->get();
?>
<div class="row">
<table border=0 role="grid" class="searchable" >
	<thead>
		
		<th>หมายเหตุ</th>
		<th> รหัสนักศึกษา </th>
		<th> ชื่อ</th>
		<th>นามสกุล</th>
		<th>ปีที่ลงทะเบียน</th>
		<th>เทอมที่ลงทะเบียนเรียน(1,2,3)</th>
		

	</thead>

<?php


foreach($users as $user){
	?>
	<tr>
		<td> 

			<?php
				$student_id = $user->student_id;
			?>
           
            <a class="btn btn-default" href="{{ url('detail_stu/'.$student_id) }}" role="button">ดูรายละเอียดของนักศึกษา</a>
            
		</td>
		<td><?php echo $user->student_id; ?></td>
        <td><?php   echo $user->first_name;?></td>
        <td><?php   echo $user->last_name;?></td>
        <td>
        	<?php  
        		if( $user->year_reg==0){
        			echo "ยังไม่ได้ลงทะเบียนเรียน";
        		}else{
        			echo $user->year_reg;}
        	?>
        </td>
        <td><?php   echo $user->p_status;?></td>
        
	</tr>

<?php
}
?>
	</tr>
</table>
</div>
<?php
}else{
    $users = DB::select("SELECT * FROM student WHERE student_dept = $admin->department_id");
    ?>

<div class="row">
<table border=0 role="grid" class="searchable" >
    <thead>
        
        <th>หมายเหตุ</th>
        <th> รหัสนักศึกษา </th>
        <th> ชื่อ</th>
        <th>นามสกุล</th>
        <th>ปีที่ลงทะเบียน</th>
        <th>เทอมที่ลงทะเบียนเรียน(1,2,3)</th>
        

    </thead>

<?php


foreach($users as $user){
    ?>
    <tr>
        <td> 

            <?php
                $student_id = $user->student_id;
            ?>
           
            <a class="btn btn-default" href="{{ url('detail_stu/'.$student_id) }}" role="button">ดูรายละเอียดของนักศึกษา</a>
            
        </td>
        <td><?php echo $user->student_id; ?></td>
        <td><?php   echo $user->first_name;?></td>
        <td><?php   echo $user->last_name;?></td>
        <td>
            <?php  
                if( $user->year_reg==0){
                    echo "ยังไม่ได้ลงทะเบียนเรียน";
                }else{
                    echo $user->year_reg;}
            ?>
        </td>
        <td><?php   echo $user->p_status;?></td>
        
    </tr>

<?php
}
?>
    </tr>
</table>
</div>

<?php } ?>

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