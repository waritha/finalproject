<?php
namespace App\Http\Controllers\Model;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Excel;
class ReportController extends Controller
{

	public function arrayMap($transactions){
		return array_map(function($object){
    		return (array) $object;
		}, $transactions);
	}

	public function detail_stu($student_id){

        $sql = "SELECT * FROM student WHERE student_id = $student_id";
        $stu_data = DB::select($sql);

        
        //dd($student_data);  
        $stu_data =$this->arrayMap($stu_data);

        $a=0;

        $stu_data = $stu_data[0];
        return view('Model.report_detail_stu')->with("stu_data",$stu_data);

         }

    public function detail_act($activity_id){

        $sql = "SELECT * FROM activity WHERE activity_id = $activity_id";
        $act_data = DB::select($sql);

        
        //dd($student_data);  
        $act_data =$this->arrayMap($act_data);

        $a=0;

        $act_data = $act_data[0];
        return view('Model.report_detail_act')->with("act_data",$act_data);

         }



    public function data_report()
    {   
        $year               = Input::get('year');
        $semester_ge        =Input::get('semester_ge');
        
        /*echo "$year";
        echo "$semester_ge";

*/
       /* $data_report =$this->arrayMap($data_report);
        $data_report = $data_report[0];*/
        return view('Model.report_detail_reg')->with("year",$year)->with("semester_ge",$semester_ge);
        
    }






} 	  
 ?>