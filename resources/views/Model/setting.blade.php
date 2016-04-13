@extends('admin.layouts.template')
@section('content')
<html>
<head>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>
<body>


 <div class="col-lg-12">
 <h3 class="page-header"><strong>ตั้งค่าชั่วโมงกิจกรรมของคณะวิทยาศาสตร์</strong></h3>
 </div>

<div class="row">
<a class="btn btn-default" href="{{ url('addformsetting')}}" role="button">เพิ่มข้อมูล</a>

<h6>ตารางแสดงรายละเอียดชั่วโมงกิจกรรมของคณะวิทยาศาสตร์</h6>
<table border=0 role="grid" class="searchable" >
	<thead>
		
		<th>หมายเหตุ</th>
		<th> ปีการศึกษา </th>
		<th>จำนวนชั่วโมงของคณะวิทยาศาสตร์</th>
		<th>จำนวนชั่วโมงของภาควิชา</th>
		<th>จำนวนชั่วโมงของชมรมและอื่นๆ</th>
		

	</thead>

<?php
$users = DB::table('setting')->get();

foreach($users as $user){
	?>
	<tr>
		<td> 

			<?php
				$year = $user->year;
			?>
           
            <a class="btn btn-default" href="{{ url('set_del/'.$year) }}" role="button" onclick="return confirm('คุณแน่ใจนะว่าต้องการที่จะลบ?')">ลบ</a>
            <a class="btn btn-default" href="{{ url('set_edit/'.$year) }}" role="button">แก้ไข</a>
            
		</td>
		<td><?php echo $user->year; ?></td>
        <td><?php   echo $user->fac_hr;?></td>
        <td><?php   echo $user->dept_hr;?></td>
        <td><?php   echo $user->club_hr;?></td>
        
	</tr>

<?php
}
?>
	</tr>
</table>
</div>

</body>
@stop