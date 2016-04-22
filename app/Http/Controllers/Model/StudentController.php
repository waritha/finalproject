<?php
namespace App\Http\Controllers\Model;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Excel;
class StudentController extends Controller
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
   	 

	public function page_student(){

		$admin = \Auth::getUser();
        return view('Model.student',  compact('admin'));
    }

    public function form(){
    	$admin = \Auth::getUser();
        return view('Model.Insert.insert_student',  compact('admin'));
    }

    public function addStudent()
	{

		$admin = \Auth::getUser();

		$std_id    = Input::get('student_id');
		$std_first =Input::get('first_name');
		$std_last  =Input::get('last_name');
		$std_year_reg  =Input::get('year_reg');
		$std_semester_ge  =Input::get('semester_ge');
		$std_p_status = Input::get('p_status');
		$std_dept = Input::get('student_dept');
		
		$sql = "INSERT INTO student VALUES ('$std_id','$std_first','$std_last',
											'$std_year_reg','$std_semester_ge','$std_p_status',
											'$std_dept')";
		try{
		 	DB::select($sql);
		 	return view('Model.student',  compact('admin'));
		}catch(\Illuminate\Database\QueryException $e){
			return view('Model.Insert.insert_student',  compact('admin'))->with("msg","error");
		}
	}
    
    public function editStudent($student_id){
    	
    	$admin = \Auth::getUser();
    	// get all data.
    	$sql = "SELECT * FROM student WHERE student_id = $student_id";
    	$student_data = DB::select($sql);

    	
    	//dd($student_data);  
    	$student_data =$this->arrayMap($student_data);
    	$student_data = $student_data[0];
    	return view('Model.Edit.edit_student',  compact('admin'))->with("student_data",$student_data);
    }


    public function updateStudent(){

    	$admin = \Auth::getUser();
    	$std_id    			= Input::get('student_id');
		//$std_title 			=Input::get('name_title');
		$std_first 			=Input::get('first_name');
		$std_last  			=Input::get('last_name');
		$std_year_reg  		=Input::get('year_reg');
		$std_semester_ge  	=Input::get('semester_ge');
		/*$std_p_status 		= Input::get('p_status');*/
		$std_dept			= Input::get('student_dept');

		


		$sql = "UPDATE student SET 
								   first_name =  '$std_first',
								   last_name = '$std_last',
								   year_reg = '$std_year_reg',
								   semester_ge = '$std_semester_ge',
								
								   student_dept = '$std_dept' WHERE student_id = $std_id";

		 DB::select($sql);
		 return view('Model.student',  compact('admin'));
    }

    public function deleteStudent($std_id){

    	$admin = \Auth::getUser();

    	$sql = "DELETE FROM student WHERE student_id = $std_id";
    	DB::select($sql);

    	return view('Model.student',  compact('admin'));

    }
    

    



}