@extends('admin.layouts.template')
@section('content')
<html>
<head>

    <title>Report Detail</title>
    <link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
    
</head>
<?php
    $dept_data = $admin->department_id;
    /*echo "$dept_data";*/
?>

<?php
    
/*
        echo "$year";
        echo "$semester_ge";
        echo "สำเร็จ";*/

        $data_stu = DB::table('student')->get();

        $data_stu = DB::select("SELECT *   FROM student s where s.semester_ge = $semester_ge and s.year_reg= $year and s.student_dept = $dept_data");
        
        $data_stu1 = DB::table('student')->get();

        $data_stu1 = DB::select("SELECT *   FROM student s where s.semester_ge = $semester_ge and s.year_reg= $year ");
        

        $data_setting = DB::table('setting')->get();
        $data_setting = DB::select("SELECT * FROM setting WHERE year = $year");

        $fac_ca_1=DB::select("SELECT SUM(G.ge_hour) as fac_ca_1
                            FROM  activity A, ge_activity G, mapping_ge_activity M
                            WHERE G.ge_category = 1 and G.ge_year = $year and A.a_year = $year and G.ge_id = M.ge_id and M.activity_id = A.activity_id and A.dept_id = 10 ");

        $dept_ca_1=DB::select("SELECT SUM(G.ge_hour) as dept_ca_1
                            FROM  activity A, ge_activity G, mapping_ge_activity M
                            WHERE G.ge_category = 1 and G.ge_year = $year and A.a_year = $year and G.ge_id = M.ge_id and M.activity_id = A.activity_id and a.dept_id >=1 and  a.dept_id <=9 ");


?>


<body>

<fieldset>
    <legend><?php echo "ปีการศึกษา $year ภาคการศึกษา $semester_ge "; 
   
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

    </legend>
    <p>
    <strong>ตารางประมวลนักศึกษาที่ผ่านและไม่ผ่านกระบวนวิชา</strong>



<div class="row">
    <table border=0 role="grid" id="table">
        <?php
                foreach($data_setting as $data_setting){
        ?> 
        <tr>
        <td rowspan="2"><strong>รหัสนักศึกษา</strong></td>
        <td rowspan="2"><strong>ชื่อ</strong></td>
        <td rowspan="2"><strong>นามสกุล</strong></td>
        <td colspan="2" ><strong>คณะวิทยาศาสตร์ </strong> </br>(ไม่น้อยกว่า 
            <?php  
                $data_setfac = $data_setting->fac_hr; 
                echo $data_setting->fac_hr; 
            ?> ชั่วโมง)
        </td>
        <td colspan="2"><strong>ภาควิชาที่สังกัด</strong></br>(ไม่น้อยกว่า 
            <?php  
                $data_setdept =  $data_setting->dept_hr; 
                echo $data_setting->dept_hr; 
            ?> ชั่วโมง)
        </td>
        <td rowspan="2"><strong>ชมรมและอื่นๆ </strong> </br>(ไม่น้อยกว่า 
            <?php   
                $data_setclub = $data_setting->club_hr;
                echo $data_setting->club_hr; 
            ?> ชั่วโมง)
        </td>
        <td rowspan="2"><strong>สถานะ</strong> </br>(ผ่าน/ไม่ผ่าน)</td>
        
        </tr>
        <?php } ?>
        <tr>
            <td><strong>กิจกรรมบังคับ</strong></br>(
                <?php
                    foreach($fac_ca_1 as $fac_ca_1){
                    echo $fac_ca_1->fac_ca_1;  
                    $fac_ca_1 = $fac_ca_1->fac_ca_1;      
                }?>
                ชั่วโมง)</td>
            <td><strong>กิจกรรมเลือกเข้าร่วม</strong></td>
            <td><strong>กิจกรรมบังคับ</strong></br>(ชั่วโมง
                <?php
                    foreach($dept_ca_1 as $dept_ca_1){
                     echo $dept_ca_1->dept_ca_1;  
                     $dept_ca_1 = $dept_ca_1->dept_ca_1;      
                    }?>
                )
            </td>
            <td><strong>กิจกรรมเลือกเข้าร่วม</strong></td>

        </tr>

        <?php
                foreach($data_stu as $data_stu){
                    $student_id = $data_stu->student_id;
        ?>

        <tr>
            <td>
                 <?php   echo $data_stu->student_id;?>
            </td>
            <td>
                <?php   echo $data_stu->first_name;?>
            </td>
            <td>
                <?php   echo $data_stu->last_name;?>
            </td>
            <td>
                <?php 
                $fac_11=DB::select("SELECT SUM(G.ge_hour) as fac11
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $student_id and g.ge_category = 1 and a.dept_id = 10 and g.ge_year = $year");
       
                    foreach($fac_11 as $fac_11){
                            $fac11 = $fac_11->fac11; 
                        if($fac11>0){
                         echo $fac_11->fac11; 
                     }else {
                         echo "0";
                     }
                } 
                ?>
            </td>
            <td>
                <?php 
                $fac_22=DB::select("SELECT SUM(G.ge_hour) as fac22
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $student_id and g.ge_category = 2 and a.dept_id = 10 and g.ge_year = $year");
        
                    foreach($fac_22 as $fac_22){
                            $fac22 = $fac_22->fac22; 
                        if($fac22>0){
                         echo $fac_22->fac22; 
                     }else {
                         echo "0";
                     }
                } 
                ?>
            </td>
            <td>
                <?php 
                $dept_11 = DB::select("SELECT SUM(G.ge_hour) as dept11
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $student_id and g.ge_category = 1 and a.dept_id >=1 and  a.dept_id <=9 and g.ge_year = $year");
        
                    foreach($dept_11 as $dept_11){
                            $dept11 = $dept_11->dept11; 
                        if($dept11>0){
                         echo $dept_11->dept11; 
                     }else {
                         echo "0";
                     }
                } 
                ?>
            </td>
            <td>
                <?php 
                $dept_22 = DB::select("SELECT SUM(G.ge_hour) as dept22
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $student_id and g.ge_category = 2 and a.dept_id >=1 and  a.dept_id <=9 and g.ge_year = $year");
        
                    foreach($dept_22 as $dept_22){
                            $dept22 = $dept_22->dept22; 
                        if($dept22>0){
                         echo $dept_22->dept22; 
                     }else {
                         echo "0";
                     }
                } 
                ?>
            </td>
            <td>
                <?php
                $club_sum = DB::select("SELECT SUM(G.ge_hour) as club22
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $student_id and a.dept_id = 11 and g.ge_year = $year");

                    foreach($club_sum as $club_sum){
                        $club22 = $club_sum->club22;
                        if($club22>0){
                            echo $club_sum->club22;
                        }else {
                         echo "0";
                     }
                    }
                ?>
            </td>


            <td>
                <?php 

                $fac_sum=DB::select("SELECT SUM(G.ge_hour) as fac33
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $student_id and a.dept_id = 10 and g.ge_year = $year");
                $dept_sum = DB::select("SELECT SUM(G.ge_hour) as dept33
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $student_id and a.dept_id >=1 and  a.dept_id <=9 and g.ge_year = $year");


                foreach($fac_sum as $fac33){
                   /* echo $fac33->fac33;*/  
                    $fac33 = $fac33->fac33; 

                }

                foreach($dept_sum as $dept_sum){
                /*echo $dept_sum->dept33; */ 
                $dept_sum1=$dept_sum->dept33;
                }
                
                if($fac11>=$fac_ca_1 and $fac33>=$data_setfac and $dept_11 >=$dept_ca_1 and $dept_sum1>$data_setdept and $club22>$data_setclub ){
                    
                    $sql1 = DB::table('student')->get();
                    $sql1 = "UPDATE student SET p_status = 3 WHERE student_id = $student_id";
                    DB::select($sql1);

                    echo '<span style="color:#00FF00;text-align:center;">ผ่าน</span>';
                }else{

                    $sql2 = DB::table('student')->get();
                    $sql2 = "UPDATE student SET p_status = 2 WHERE student_id = $student_id";
                    DB::select($sql2);

                    echo '<span style="color:#FF0000;text-align:center;">ไม่ผ่าน</span>';
                    /*echo"$dept_ca_1 ";*/

                }







                ?>
            </td>

            
        </tr>
        
        <?php } ?>

    </table>    
    </div>
<p>
    <?php 

    echo "string";


    ?>
</br>
</br>
<a class="btn btn-default" href="" role="button">ออกรายงาน</a>
</fieldset>



</body>


</html>
@stop