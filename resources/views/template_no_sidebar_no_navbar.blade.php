<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>ระบบจัดการข้อมูล</title>
 <!-- Bootstrap Core CSS -->
 @include('admin.layouts.inc-stylesheet')
 @yield('stylesheet')

 <link rel="stylesheet" href="{{ asset('foundation/css/foundation.css') }} " />
 <script   src="{{ asset('jquery-2.1.4.min.js') }}"></script>
 <script  src="{{ asset('foundation/js/vendor/jQuery.js') }}"></script>
    <script  src="{{ asset('foundation/js/vendor/modernizr.js') }}"></script>
    <script src="{{ asset('foundation/js/foundation.min.js')}}"></script>
    <script src="{{ asset('jquery-1.12.0.min.js') }}"></script>  <!-- เพิ่มพวกajaxมา -->
</head>
<body>
<div id="wrapper">
 <!-- Navigation -->
 
 <!-- Page Content -->
 	
 		
 @yield('content')
 <!-- /.row -->
 		
 <!-- /.container-fluid -->
 	
 <!-- /#page-wrapper -->
</div>
 <!-- /#wrapper -->
 <!-- jQuery -->
 @include('admin.layouts.inc-scripts')
 @yield('scripts')
</body>
</html>
