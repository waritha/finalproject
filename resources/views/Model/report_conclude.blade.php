@extends('admin.layouts.template')
@section('content')
<html>
<head>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
    <title>Report Conclude</title>
</head>
<body>

<!-- 
 <div class="col-lg-12">
 <h3 class="page-header">สรุปรายละเอียดการเข้าร่วมกิจกรรม</h3>
 </div> -->


<fieldset>
    <legend><?php echo "กรุณากรอกข้อมูล"; ?></legend>

    
    <form action="{{ url('data_report')}}" method="post">
     <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

    <div class="row">
        <div class="large-2 columns">
            <label>ปีการศึกษา</label>
            <input type="text" name="year">
        </div>
    </div>
    
    <div class="row">
        <div class="large-2 columns">
            <label>ภาคการศึกษา</label>
            <input type="text" name="semester_ge">
        </div>
    </div>
    
    <div class="row">
    <input type="submit" class="button" value="ตกลง" > 
    </div>
<!--     </form> -->

</fieldset>

</div>
</body>
@stop