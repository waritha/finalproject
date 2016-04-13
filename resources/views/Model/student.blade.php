@extends('admin.layouts.template')
@section('content')
<html>
<head>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>
<body>


 <div class="col-lg-12">
 <h3 class="page-header">ข้อมูลนักศึกษา</h3>
 </div>


<p>
<!-- <div class="row">
<a href="{{url('studentform')}}">เพิ่มข้อมูลนักศึกษา</a>
</div>
<div class="row">
<input id="filter" type="text" class="form-control " placeholder="ป้อนคำค้นที่ต้องการ">
</div> -->

<div class="row">
ค้นหา
</div>

<div class="row">
<form action="{{url('search/student')}}">
	<input type="text" class="form-control " name="keyword" placeholder="ป้อนคำค้นที่ต้องการ">
	<input type="submit" class="button" value="ค้นหา" >
</form>
</div>

<div class="row">
<table width="1100" border=0 role="grid" class="searchable" >
	<thead>
		
		<th>หมายเหตุ</th>
		<th> รหัสนักศึกษา </th>
		<th> ชื่อ</th>
		<th>นามสกุล</th>
		<th>ปีที่ลงทะเบียน</th>
		<th>เทอมที่ลงทะเบียนเรียน(1,2,3)</th>
		<th>สถานะ(ผ่าน/ไม่ผ่าน)</th>
		<th>ภาควิชาที่สังกัด</th>
		

	</thead>

<?php
$users = DB::table('student')->get();
/*$users = DB::select("SELECT S.*,D.*,P.*
	FROM student S,department D ,p_status P
	WHERE S.student_dept = D.dept_id and S.p_status = P.p_status_id");*/

foreach($users as $user){
	?>
	<tr>
		<td> 
			<?php
				$student_id = $user->student_id;

			?>
			
			<a href="{{ url('edit/'.$student_id) }}">แก้ไข </a> |
			<a href="{{ url('delete/'.$student_id) }}" onclick="return confirm('คุณแน่ใจนะว่าต้องการที่จะลบ?')">ลบ</a>  
		</td>
		<td><?php echo $user->student_id; ?></td>
        <td><?php   echo $user->first_name;?></td>
        <td><?php   echo $user->last_name;?></td>

        <td><?php   if($user->year_reg == 0){
        		echo "ยังไม่ได้ลงทะเบียนเรียน";
        	} 
        	else{
        		echo $user->year_reg;
        	}
        ?>
        </td>

        <td><?php  
        	 if($user->semester_ge == 0){
        		echo "ยังไม่ได้ลงทะเบียนเรียน";
        	}
            elseif($user->semester_ge == 1){
                echo "1";
            } 
        	elseif($user->semester_ge == 2){
        		echo "2";
        	}
            elseif($user->semester_ge == 3){
                echo "3";
            }

        ?>
        </td>

        <td><?php   
        	if($user->p_status == 1){
        		echo "ยังไม่ได้ประมวลผล";
        	}
        	elseif($user->p_status == 2){
        		echo "ไม่ผ่านกิจกรรม";
        	}
        	elseif($user->p_status == 3){
        		echo "ผ่านกิจกรรม";
        	}
        ?></td>

        <td><?php  

            if($user->student_dept == 1){
                echo "ภาควิชาชีววิทยา";
            }
            elseif($user->student_dept == 2){
                echo "ภาควิชาเคมี";
            }
            elseif($user->student_dept == 3){
                echo "ภาควิชาธรณีวิทยา";
            }
            elseif($user->student_dept == 4){
                echo "ภาควิชาฟิกสิกส์และวัสดุศาสตร์";
            }
            elseif($user->student_dept == 5){
                echo "ภาควิชาเคมีอุตสาหกรรม";
            }
            elseif($user->student_dept == 6){
                echo "ภาควิชาคณิตศาสตร์";
            }
            elseif($user->student_dept == 7){
                echo "ภาควิชาสถิติ";
            }
            elseif($user->student_dept == 8){
                echo "ภาควิชาวิทยาการคอมพิวเตอร์";
            }
            elseif($user->student_dept == 9){
                echo "สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม";
            }
            elseif($user->student_dept == 10){
                echo "สโมสรนักศึกษา";
            }
            elseif($user->student_dept == 11){
                echo "ชมรมและอื่นๆ";
            }



         ?></td>
        

        

	</tr>

<?php
}
?>
	</tr>
</table>
</div>

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