@extends('admin.layouts.template')
@section('content')
<html>
<head>
    <link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
    <title>Report Activity</title>

</head>
<body>

    <?php
        $act_id                     = $act_data['activity_id'];
        $act_name                   = $act_data['a_name'];
        $act_year                   = $act_data['a_year'];

       $users = DB::select("SELECT s.student_id, s.first_name, s.last_name FROM activity a INNER JOIN participation_1 p ON a.activity_id = p.activity_id and a.activity_id=$act_id INNER JOIN student s ON p.student_id = s.student_id ");

       $users1 = DB::table('participation_1')->get(); 
       $users1 = DB::select("SELECT COUNT(*) as sumstu
                            FROM participation_1
                            WHERE activity_id = $act_id");

?>

<fieldset>
    <legend><?php echo "ข้อมูลกิจกรรม $act_name ปีการศึกษา $act_year"; ?></legend>
    <p>
    <strong>ตารางแสดงรายละเอียดรายชื่อนักศึกษาที่เข้าร่วมกิจกรรม</strong>
    (จำนวนนักศึกษาที่เข้าร่วมทั้งหมด
    <?php
        foreach($users1 as $users1){
            echo $users1->sumstu;
        }
    ?>
    คน)
    <p>
    <div class="row">
<table border=0 role="grid" id="table" >
    <thead>
        <th>รหัสนักศึกษาที่เข้าร่วม</th>
        <th>ชื่อ</th>
        <th>นามสกุล</th>
    </thead>
<?php

foreach($users as $user){
    ?>
    <tr>
        <td><?php echo $user->student_id; ?></td>
        <td><?php echo $user->first_name; ?></td>
        <td><?php echo $user->last_name; ?></td></td>

    </tr>

<?php
}
?>
    

</fieldset>

</body>
@stop