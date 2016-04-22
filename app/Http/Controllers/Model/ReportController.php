<?php
namespace App\Http\Controllers\Model;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Excel;
class ReportController extends Controller
{

    public function __construct(){
    $this->middleware('auth');
    }

    public function getIndex(){
     $admin = \Auth::getUser();
     
     $department_id= $admin->deparment_id;

    return view('admin.dashboard.index', compact('admin'));
    }

	public function arrayMap($transactions){
		return array_map(function($object){
    		return (array) $object;
		}, $transactions);
	}

    public function page_report_student(){

        $admin = \Auth::getUser();
        return view('Model.report_student', compact('admin'));
    }

    public function page_report_activity(){

        $admin = \Auth::getUser();
        return view('Model.report_activity', compact('admin'));
    }

    public function page_report_conclude(){

        $admin = \Auth::getUser();
        return view('Model.report_conclude', compact('admin'));
    }

	public function detail_stu($student_id){

        $admin = \Auth::getUser();
        $sql = "SELECT * FROM student WHERE student_id = $student_id";
        $stu_data = DB::select($sql);

        
        //dd($student_data);  
        $stu_data =$this->arrayMap($stu_data);

        $a=0;

        $stu_data = $stu_data[0];
        return view('Model.report_detail_stu', compact('admin'))->with("stu_data",$stu_data);

         }

    public function detail_act($activity_id){

        $admin = \Auth::getUser();
        $sql = "SELECT * FROM activity WHERE activity_id = $activity_id";
        $act_data = DB::select($sql);

        
        //dd($student_data);  
        $act_data =$this->arrayMap($act_data);

        $a=0;

        $act_data = $act_data[0];
        return view('Model.report_detail_act', compact('admin'))->with("act_data",$act_data);

         }



    public function data_report()
    {   
        $admin = \Auth::getUser();
        $year               = Input::get('year');
        $semester_ge        =Input::get('semester_ge');
        
        /*echo "$year";
        echo "$semester_ge";

*/
       /* $data_report =$this->arrayMap($data_report);
        $data_report = $data_report[0];*/
        return view('Model.report_detail_reg', compact('admin'))->with("year",$year)->with("semester_ge",$semester_ge);
        
    }






} 	  
 ?>