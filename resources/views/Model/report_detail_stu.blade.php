@extends('admin.layouts.template')
@section('content')
<html>
<head>
    <link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
    <title>Report Student</title>

</head>
<body>

    <?php
    
        $stu_id                 = $stu_data['student_id'];
        $stu_firstname          = $stu_data['first_name'];
        $stu_lastname           = $stu_data['last_name'];
        $stu_reg                = $stu_data['year_reg'];
        $stu_dept               = $stu_data['student_dept'];


        $users = DB::table('participation_1')->get();

        $users = DB::select("SELECT * FROM participation_1 WHERE student_id = $stu_id");

        $users1 = DB::table('setting')->get();
        $users1 = DB::select("SELECT * FROM setting WHERE year = $stu_reg");


        $fac_1 = DB::select("SELECT a_name, ge_hour
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id and g.ge_category = 1 and a.dept_id = 10 and g.ge_year = $stu_reg");
        $fac_11=DB::select("SELECT SUM(G.ge_hour) as fac11
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id and g.ge_category = 1 and a.dept_id = 10 and g.ge_year = $stu_reg");
       $fac_ca_1=DB::select("SELECT SUM(G.ge_hour) as fac_ca_1
                            FROM  activity A, ge_activity G, mapping_ge_activity M, student S
                            WHERE S.year_reg = G.ge_year and G.ge_category = 1 and G.ge_year = $stu_reg and A.a_year = $stu_reg and G.ge_id = M.ge_id and M.activity_id = A.activity_id and A.dept_id = 10 and S.student_id = $stu_id");


        $fac_2 = DB::select("SELECT a_name, ge_hour
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id and g.ge_category = 2 and a.dept_id = 10 and g.ge_year = $stu_reg");
        $fac_22=DB::select("SELECT SUM(G.ge_hour) as fac22
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id and g.ge_category = 2 and a.dept_id = 10 and g.ge_year = $stu_reg");
        $fac_ca_2=DB::select("SELECT SUM(G.ge_hour) as fac_ca_2
                            FROM  activity A, ge_activity G, mapping_ge_activity M, student S
                            WHERE S.year_reg = G.ge_year and G.ge_category = 2 and G.ge_year = $stu_reg and A.a_year = $stu_reg and G.ge_id = M.ge_id and M.activity_id = A.activity_id and A.dept_id = 10 and S.student_id = $stu_id");


        $fac_sum=DB::select("SELECT SUM(G.ge_hour) as fac33
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id and a.dept_id = 10 and g.ge_year = $stu_reg");





        $dept_1 = DB::select("SELECT a_name, ge_hour
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id  and a.dept_id >=1 and  a.dept_id <=9 and g.ge_category = 1 and g.ge_year = $stu_reg");
        $dept_11 = DB::select("SELECT SUM(G.ge_hour) as dept11
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id and g.ge_category = 1 and a.dept_id >=1 and  a.dept_id <=9 and g.ge_year = $stu_reg");
        $dept_ca_1=DB::select("SELECT SUM(G.ge_hour) as dept_ca_1
                            FROM  activity A, ge_activity G, mapping_ge_activity M, student S
                            WHERE S.year_reg = G.ge_year and G.ge_category = 1 and G.ge_year = $stu_reg and A.a_year = $stu_reg and G.ge_id = M.ge_id and M.activity_id = A.activity_id and a.dept_id >=1 and  a.dept_id <=9 and A.dept_id = $stu_dept and S.student_id = $stu_id");

        $dept_2 = DB::select("SELECT a_name, ge_hour
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id  and a.dept_id >=1 and  a.dept_id <=9 and g.ge_category = 2 and g.ge_year = $stu_reg");
        $dept_22 = DB::select("SELECT SUM(G.ge_hour) as dept22
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id and g.ge_category = 2 and a.dept_id >=1 and  a.dept_id <=9 and g.ge_year = $stu_reg");
        $dept_ca_2=DB::select("SELECT SUM(G.ge_hour) as dept_ca_2
                            FROM  activity A, ge_activity G, mapping_ge_activity M, student S
                            WHERE S.year_reg = G.ge_year and G.ge_category = 2 and G.ge_year = $stu_reg and A.a_year = $stu_reg and G.ge_id = M.ge_id and M.activity_id = A.activity_id and a.dept_id >=1 and  a.dept_id <=9 and A.dept_id = $stu_dept and S.student_id = $stu_id");


        $dept_sum = DB::select("SELECT SUM(G.ge_hour) as dept33
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id and a.dept_id >=1 and  a.dept_id <=9 and g.ge_year = $stu_reg");


        $club = DB::select("SELECT a_name, ge_hour
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id and g.ge_category = 3 and a.dept_id = 11 and g.ge_year = $stu_reg");
        $club_11 = DB::select("SELECT SUM(G.ge_hour) as club11
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id and g.ge_category = 3 and a.dept_id = 11 and g.ge_year = $stu_reg");
        $club_sum = DB::select("SELECT SUM(G.ge_hour) as club22
                            FROM participation_1 p, activity a,mapping_ge_activity m,ge_activity g
                            WHERE p.activity_id = a.activity_id and a.activity_id = m.activity_id and m.ge_id = g.ge_id and p.student_id = $stu_id and a.dept_id = 11 and g.ge_year = $stu_reg");



        $t_fac1  = DB::select("SELECT * FROM activity a INNER JOIN mapping_ge_activity m ON a.activity_id = m.activity_id and a.dept_id=10 INNER JOIN ge_activity g ON m.ge_id =g.ge_id and g.ge_year=2555 and g.ge_category=1 LEFT OUTER JOIN participation_1 p ON a.activity_id = p.activity_id;");
        $t_dept1 = DB::select("SELECT * FROM activity a INNER JOIN mapping_ge_activity m ON a.activity_id = m.activity_id and a.dept_id >=1 and  a.dept_id <=9 INNER JOIN ge_activity g ON m.ge_id =g.ge_id and g.ge_year=2555 and g.ge_category=1 LEFT OUTER JOIN participation_1 p ON a.activity_id = p.activity_id;
");



?>

<fieldset>
    <legend><?php echo "ข้อมูลนักศึกษา $stu_id $stu_firstname $stu_lastname $stu_reg"; ?></legend>
    <p>
    <strong>ตารางแสดงรายละเอียดกิจกรรมที่จัดโดยคณะวิทยาศาสตร์</strong>
    (ไม่น้อยกว่า <?php
                foreach($users1 as $users1){
                    echo $users1->fac_hr; ?>
               ชั่วโมง )
    <div class="row">
    <table border=0 role="grid" id="table" >
        <thead>
        <th>กิจกรรมบังคับเข้าร่วม</th>
        <th>ชั่วโมง</th>
        </thead>
        <?php
        foreach($t_fac1 as $t_fac1){ 
        ?>
        <tr>
            <td> 
            <?php 
                echo $t_fac1->a_name; 
            ?>
            </td>
            <td>
            <?php 
                if($t_fac1->student_id == $stu_id){
                    echo $t_fac1->ge_hour; 
                }else{
                    echo "0";
                }
            ?>
            </td>
        </tr>
            <?php }?>
            <thead>
                <th>รวมจำนวนชั่วโมง</th>
                <th>
                    <?php
                    foreach($fac_11 as $fac_11){
                         echo $fac_11->fac11; 
      
                    ?>
                    
                </th>
            </thead>
    </table>
    </div>


    <div class="row">
    <table border=0 role="grid" id="table" >
        <thead>
        <th>กิจกรรมเลือกเข้าร่วม</th>
        <th>ชั่วโมง</th>
        </thead>
        <?php
        foreach($fac_2 as $user2){
        ?>
        <tr>
            <td> 
            <?php echo $user2->a_name; ?>
            </td>
            <td>
            <?php echo $user2->ge_hour; ?>
            </td>
        </tr>
            <?php  } ?>
            <thead>
                <th>รวมจำนวนชั่วโมง</th>
                <th>
                    <?php
                    foreach($fac_22 as $fac_22){
                    ?>
                    <?php echo $fac_22->fac22; ?>      
                   
                </th>
            </thead>
    </table>
    </div>


    <div class="row">
    <strong>สรุปจำนวนชั่วโมง</strong>    
    <table border=0 role="grid" id="table">
        <thead>
        <th>รายการ</th>
        <th>ชั่วโมง</th>
        <th>จากเกณฑ์</th>
        <th>หมายเหตุ(จำนวนชั่วโมงที่ค้าง)</th>
        </thead>  
        <tr>
            <td>ชั่วโมงกิจกรรมบังคับเข้าร่วมทั้งหมด</td>
            <td>
                <?php 
                    echo $fac_11->fac11; 
                    $fac_11 = $fac_11->fac11; 
                } ?> 
            </td>
            <td>
                <?php
                    foreach($fac_ca_1 as $fac_ca_1){
                    echo $fac_ca_1->fac_ca_1;  
                    $fac_ca_1 = $fac_ca_1->fac_ca_1;      
                }?>
            </td>
            <td>
            <?php
                if($fac_11 >= $fac_ca_1){
                    echo '<span style="color:#00FF00;text-align:center;">ครบแล้ว</span>';
                }
                elseif($fac_11 < $fac_ca_1){
                    $f1 = $fac_ca_1 - $fac_11;
                    echo '<span style="color:#FF0000;text-align:center;">ขาดอีก'.$f1.'</span>';
                }else{
                    echo '<span style="color:#FF0000;text-align:center;">มีข้อผิดพลาดกรุณาตรวจสอบ</span>';
                }
            ?>
            </td>
        </tr>
        <tr>
            <td>ชั่วโมงกิจกรรมเลือกเข้าร่วมทั้งหมด</td>
            <td>
            <?php 
                echo $fac_22->fac22;
                $fac_22 = $fac_22->fac22; 
            }?> 
            </td>
            <td>
                <?php
                    /*foreach($fac_ca_2 as $fac_ca_2){
                    echo $fac_ca_2->fac_ca_2;  
                    $fac_ca_2 = $fac_ca_2->fac_ca_2;
                }*/
                ?>
            </td>
            <td>
                <?php
                    /*if($fac_22 >= $fac_ca_2){
                        echo '<span style="color:#00FF00;text-align:center;">ครบแล้ว</span>';
                    }
                    elseif($fac_22 < $fac_ca_2){
                        $f2 = $fac_ca_2 - $fac_22;
                        echo '<span style="color:#FF0000;text-align:center;">ขาดอีก'.$f2.'</span>';
                    }else{
                        echo '<span style="color:#FF0000;text-align:center;">มีข้อผิดพลาดกรุณาตรวจสอบ</span>';
                    }*/
                ?>
            </td>
        </tr>
        <tr>
            <td>ชั่วโมงกิจกรรมที่เข้าร่วมทั้งหมด</td>
            <td>
                <?php
                    foreach($fac_sum as $fac33){
                    echo $fac33->fac33;  
                    $fac33 = $fac33->fac33;     
                }?>
            </td>
            <td>  
                <?php 
                    echo $users1->fac_hr; 
                    $fac_hr = $users1->fac_hr;
                ?>
            </td>
            <td>
                <?php
                    if($fac33 >= $fac_hr){
                        echo '<span style="color:#00FF00;text-align:center;">ครบแล้ว</span>';
                    }
                    elseif($fac33 < $fac_hr){
                        $f3 = $fac_hr - $fac33;
                        echo '<span style="color:#FF0000;text-align:center;">ขาดอีก'. $f3.'</span>';
                    }else{
                        echo '<span style="color:#FF0000;text-align:center;">มีข้อผิดพลาดกรุณาตรวจสอบ</span>';
                    }
                ?>
            </td>
        </tr>
    </table>
    </div>
</br>




   

    <p>
    <strong>ตารางแสดงรายละเอียดกิจกรรมที่จัดโดยภาควิชาที่นักศึกษาสังกัด</strong>
    (ไม่น้อยกว่า <?php echo $users1->dept_hr; ?>
               ชั่วโมง )
    <div class="row">
    <table border=0 role="grid" id="table" >
        <thead>
        <th>กิจกรรมบังคับเข้าร่วม</th>
        <th>ชั่วโมง</th>
        </thead>
        <?php
        foreach($t_dept1 as $t_dept1){
        ?>
        <tr>
            <td> 
            <?php echo $t_dept1->a_name; ?>
            </td>
            <td>
            <?php 
                if($t_dept1->student_id == $stu_id){
                    echo $t_fac1->ge_hour; 
                }else{
                    echo "0";
                }
            ?>
            </td>
        </tr>
            <?php } ?>
            <thead>
                <th>รวมจำนวนชั่วโมง</th>
                <th>
                    <?php
                    foreach($dept_11 as $dept_11){
                    ?>
                    <?php echo $dept_11->dept11; ?>      
                   
                </th>
            </thead>



    </table>
    </div>
    <div class="row">
    <table border=0 role="grid" id="table" >
        <thead>
        <th>กิจกรรมเลือกเข้าร่วม</th>
        <th>ชั่วโมง</th>
        </thead>
        <?php

        foreach($dept_2 as $user4){
        ?>
        <tr>
            <td> 
            <?php echo $user4->a_name; ?>
            </td>
            <td>
            <?php echo $user4->ge_hour; ?>
            </td>

        </tr>

            <?php
                }
            ?>

            <thead>
                <th>รวมจำนวนชั่วโมง</th>
                <th>
                  <?php
                    foreach($dept_22 as $dept_22){
                    ?>
                    <?php echo $dept_22->dept22; ?>      
                     

                </th>
            </thead>
        
    </table>
    </div>

    <div class="row">
    <strong>สรุปจำนวนชั่วโมง</strong>    
    <table border=0 role="grid" id="table">
        <thead>
        <th>รายการ</th>
        <th>ชั่วโมง</th>
        <th>จากเกณฑ์</th>
        <th>หมายเหตุ(จำนวนชั่วโมงที่ค้าง)</th>
        </thead>  
        <tr>
            <td>ชั่วโมงกิจกรรมบังคับเข้าร่วมทั้งหมด</td>
            <td><?php 
                echo $dept_11->dept11; 
                $dept_11 = $dept_11->dept11;
                }?> 
            </td>
            <td><?php
                    foreach($dept_ca_1 as $dept_ca_1){
                     echo $dept_ca_1->dept_ca_1;  
                     $dept_ca_1 = $dept_ca_1->dept_ca_1;      
                    }?>
            </td>
            <td>
            <?php
                if($dept_11 >= $dept_ca_1){
                    echo '<span style="color:#00FF00;text-align:center;">ครบแล้ว</span>';
                }
                elseif($dept_11 < $dept_ca_1){
                    $c = $dept_ca_1 - $dept_11;
                    echo '<span style="color:#FF0000;text-align:center;">ขาดอีก'.$c.'</span>';
                }else{
                    echo '<span style="color:#FF0000;text-align:center;">มีข้อผิดพลาดกรุณาตรวจสอบ</span>';
                }
            ?>
            </td>
        </tr>
        <tr>
            <td>ชั่วโมงกิจกรรมเลือกเข้าร่วมทั้งหมด</td>
            <td><?php 
                echo $dept_22->dept22; 
                $dept_22 = $dept_22->dept22; 
                }?> 
            </td>
            <td>
                <?php
                    /*foreach($dept_ca_2 as $dept_ca_2){
                    echo $dept_ca_2->dept_ca_2;
                    $dept_ca_2 = $dept_ca_2->dept_ca_2;
                         
                    }*/
                ?>
            </td>
            <td>
            <?php
               /* if($dept_22 >= $dept_ca_2){
                    echo '<span style="color:#00FF00;text-align:center;">ครบแล้ว</span>';
                }
                elseif($dept_22 < $dept_ca_2){
                    $c2 = $dept_ca_2 - $dept_22;
                    echo '<span style="color:#FF0000;text-align:center;">ขาดอีก'.$c2.'</span>';
                }else{
                    echo '<span style="color:#FF0000;text-align:center;">มีข้อผิดพลาดกรุณาตรวจสอบ</span>';
                }*/
            ?>

            </td>
        </tr>
        <tr>
            <td>ชั่วโมงกิจกรรมที่เข้าร่วมทั้งหมด</td>
            <td> 
            <?php
                foreach($dept_sum as $dept_sum){
                echo $dept_sum->dept33;  
                $dept_sum1=$dept_sum->dept33;
            }?>
            </td>
            <td>
            <?php 
                echo $users1->dept_hr; 
                $dept_hr=$users1->dept_hr;
            ?>     
            </td>
            <td>
            <?php
            if($dept_sum1 >= $dept_hr){
                echo '<span style="color:#00FF00;text-align:center;">ครบแล้ว</span>';
            }
            elseif($dept_sum1 < $dept_hr){
                $d = $dept_hr - $dept_sum1;
                echo '<span style="color:#FF0000;text-align:center;">ขาดอีก'.$d.'</span>';
            }else{
                echo '<span style="color:#FF0000;text-align:center;">มีข้อผิดพลาดกรุณาตรวจสอบ</span>';
            }
            ?> 
        
            </td>
        </tr>
    </table>
    </div>
</br>



    <p>
    <strong>ตารางแสดงรายละเอียดกิจกรรมที่จัดโดยชมรมและอื่นๆ</strong>
    (ไม่น้อยกว่า <?php echo $users1->club_hr;  ?>
               ชั่วโมง )
    <div class="row">
    <table border=0 role="grid" id="table" >
        <thead>
        <th>ชื่อกิจกรรม</th>
        <th>ชั่วโมง</th>
        </thead>
        <?php

        foreach($club as $user5){
        ?>
        <tr>
            <td> 
            <?php echo $user5->a_name; ?>
            </td>
            <td>
            <?php echo $user5->ge_hour; ?>
            </td>

        </tr>

            <?php
                }
            ?>


            <thead>
                <th>รวมจำนวนชั่วโมง</th>
                <th>
                   <?php
                    foreach($club_11 as $club_11){
                    ?>
                    <?php echo $club_11->club11; ?>      
                    <?php }?>

                </th>
            </thead>
    </table>
    </div>

    <div class="row">
    <strong>สรุปจำนวนชั่วโมง</strong>    
    <table border=0 role="grid" id="table">
        <thead>
        <th>รายการ</th>
        <th>ชั่วโมง</th>
        <th>จากเกณฑ์</th>
        <th>หมายเหตุ(จำนวนชั่วโมงที่ค้าง)</th>
        </thead>  
        <tr>
            <td>ชั่วโมงกิจกรรมบังคับเข้าร่วมทั้งหมด</td>
            <td> 
                <?php
                    foreach($club_sum as $club_sum){
                    echo $club_sum->club22; 
                    $club_sum1 = $club_sum->club22;
                    }?>
            </td>
            <td>
                <?php 
                    echo $users1->club_hr; 
                    $club_hr = $users1->club_hr;
                
                }?>  
            </td>
            <td>
                <?php
                    if($club_sum1 >= $club_hr){
                        echo '<span style="color:#00FF00;text-align:center;">ครบแล้ว</span>';
                    }
                    elseif($club_sum1 < $club_hr){
                        $g = $club_hr - $club_sum1;
                        echo '<span style="color:#FF0000;text-align:center;">ขาดอีก'.$g.'</span>';
                    }else{
                        echo '<span style="color:#FF0000;text-align:center;">มีข้อผิดพลาดกรุณาตรวจสอบ</span>';
                    }
                ?>
            </td>
        </tr>
    </table>
    </div>
</br>

<a class="btn btn-default" href="" role="button">ออกรายงาน</a>
</fieldset>




</body>
@stop