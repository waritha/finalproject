@extends('admin.layouts.template')
@section('content')

<html>
<head>

	<title>Add Setting</title>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>
<body>

	<?php
		if(!isset($msg)){
			$msg="";
		}
	?>

	
	<form action="{{ url('addset')}}" method="post">
	<fieldset>
    <legend><strong>เพิ่มชั่วโมงกิจกรรมของคณะวิทยาศาสตร์</strong></legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	<div class="row">
	    <div class="large-2 columns">
			<label>ปีการศึกษา</label>
			<input type="text" name="year">
		</div>
	</div>
	
	<div class="row">
		<div class="large-2 columns">
			<label>จำนวนชั่วโมงของ</br>คณะวิทยาศาสตร์</label>
			<input type="text" name="fac_hr">
			
		</div>
	</div>

	<div class="row">
		<div class="large-2 columns">
			<label>จำนวนชั่วโมงของ</br>ภาควิชา</label>
			<input type="text" name="dept_hr">
			
		</div>
	</div>

	<div class="row">
		<div class="large-2 columns">
			<label>จำนวนชั่วโมงของ</br>ชมรมและอื่นๆ</label>
			<input type="text" name="club_hr">
			
		</div>
	</div>
	
	<div class="row">
	<input type="submit" class="button" value="ตกลง" > <input type="reset"  class="button" value="รีเซ็ต">
	</div>
	</fieldset>
	</form>


<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">Awesome. I have it.</h2>
  <p class="lead">Your couch.  It is mine.</p>
  <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<script type="text/javascript">
	// $(document).ready(function(){
	//   $('#myModal').foundation('reveal', 'open');
	// });

	$(document).ready(function(){
	  <?php if($msg=="error"){?>
	  alert("ปีการศึกษาศึกษา นี้มีอยู่แล้ว");
	  <?php } ?>

	});

</script>




</body>


</html>
@stop