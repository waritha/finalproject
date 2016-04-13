@extends('admin.layouts.template')
@section('content')
<html>
<head>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>
<body>


 <div class="col-lg-12">
 <h3 class="page-header">สรุปรายละเอียดของนักศึกษา</h3>
 </div>


<div class="row">
<input id="filter" type="text" class="form-control" placeholder="ป้อนคำค้นที่ต้องการ">
</div>
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
$users = DB::table('student')->get();

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