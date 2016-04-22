<?php
namespace App\Http\Controllers\Model;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Excel;
class GEactivityController extends Controller
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

	public function page_ge_activitys(){

		$admin = \Auth::getUser();
        return view('Model.ge_activity_1', compact('admin'));
    }
   	  
    public function geform(){
    	$admin = \Auth::getUser();
        return view('Model.Insert.insert_GEactivity', compact('admin'));
    }

    public function addge()
	{
		$admin = \Auth::getUser();
		$atvge_id    = Input::get('ge_id');
		$atvge_name =Input::get('ge_name');
		$atvge_category =Input::get('ge_category');
		$atvge_hour  =Input::get('ge_hour');
		$atvge_year  =Input::get('ge_year');


		//dd($std_id.$std_title.$std_first.$std_last);

		$sql = "INSERT INTO ge_activity VALUES ('$atvge_id','$atvge_name','$atvge_category',
			'$atvge_hour','$atvge_year')";

		 DB::select($sql);
		 return view('Model.ge_activity', compact('admin'))->with("year",$atvge_year);


		 
	}

   	public function editActivity($ge_id){
    	
    	// get all data.
    	$admin = \Auth::getUser();
    	$sql = "SELECT * FROM ge_activity WHERE ge_id = $ge_id";
    	$activity_data = DB::select($sql);

    	
    	//dd($activity_data);  
    	$activity_data =$this->arrayMap($activity_data);
    	$activity_data = $activity_data[0];
    	return view('Model.Edit.edit_GEactivity', compact('admin'))->with('activity_data',$activity_data);
    }

    public function updateActivity(){


    	$admin = \Auth::getUser();
    	$ge_id    = Input::get('ge_id');
		$ge_name =Input::get('ge_name');
		$ge_category =Input::get('ge_category');
		$ge_hour  =Input::get('ge_hour');
		$ge_year  =Input::get('ge_year');


		$sql = "UPDATE ge_activity SET ge_name = '$ge_name' ,
		                           ge_category =  '$ge_category',
			ge_hour = '$ge_hour',ge_year ='$ge_year' WHERE ge_id = $ge_id";

		 DB::select($sql);
		 return view('Model.ge_activity', compact('admin'))->with("year",$ge_year);
    }

    public function deleteActivity($ge_id,$year){

    	$admin = \Auth::getUser();
    	/*$year               = Input::get('year');*/
    	$sql = "DELETE FROM ge_activity WHERE ge_id = $ge_id and ge_year = $year";
    	DB::select($sql);
		//return view('del');
    	//continue;
		//return ('del');
		//clearData();
    	return view('Model.ge_activity', compact('admin'))->with("year",$year);

    }

    public function ge_activity_1()
    {   
    	$admin = \Auth::getUser();
        $year               = Input::get('year');
        
        /*echo "$year";
        echo "$semester_ge";

*/
       /* $data_report =$this->arrayMap($data_report);
        $data_report = $data_report[0];*/
        return view('Model.ge_activity', compact('admin'))->with("year",$year);
        
    }



}