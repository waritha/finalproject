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
 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
 <span class="sr-only">Toggle navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>

<?php

    $dept_data = $admin->department_id;
?>

 <a class="navbar-brand" href="{{url('admin/index')}}">
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

            
            $name =$admin->first_name;
            $last =$admin->last_name;

            echo "       $name $last";

           /* {{$admin->first_name}} {{$admin->last_name}}*/
?>


 </a>
 </div>
 <!-- /.navbar-header -->
 @include('admin.layouts.inc-header')
 <!-- /.navbar-top-links -->
 @include('admin.layouts.inc-left-sidebar')
 <!-- /.navbar-static-side -->
 </nav>
 <!-- Page Content -->
 <div id="page-wrapper">
 <div class="container-fluid">
 @yield('content')
 <!-- /.row -->
 </div>
 <!-- /.container-fluid -->
 </div>
 <!-- /#page-wrapper -->
 </div>
 <!-- /#wrapper -->
 <!-- jQuery -->
 @include('admin.layouts.inc-scripts')
 @yield('scripts')
</body>
</html>
