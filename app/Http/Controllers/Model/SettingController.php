<?php
namespace App\Http\Controllers\Model;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Excel;
class SettingController extends Controller
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

    public function page_setting(){

        $admin = \Auth::getUser();
        return view('Model.setting', compact('admin'));
    }

    public function set_del($year){
        $admin = \Auth::getUser();
        $sql = "DELETE FROM setting WHERE year = $year";
        DB::select($sql);
        return view('Model.setting', compact('admin'));
    }

    public function addformsetting(){
        $admin = \Auth::getUser();
        return view('Model.Insert.insert_setting', compact('admin'));
    }

    public function addsetting()
    {
        $admin = \Auth::getUser();
        $year               = Input::get('year');
        $fac_hr              =Input::get('fac_hr');
        $dept_hr             =Input::get('dept_hr');
        $club_hr         =Input::get('club_hr');
        
        $sql0 = "SELECT * FROM setting WHERE year LIKE '".$year."'";
        
        /*if($sql0->num_rows <= 0){*/
        if(count(DB::select($sql0)) <= 0){

        $sql = "INSERT INTO setting VALUES ('$year','$fac_hr','$dept_hr',
                                            '$club_hr')";
        DB::select($sql);
        }else{
        $sql2= "UPDATE setting SET 
                                   fac_hr = '$fac_hr',
                                   dept_hr = '$dept_hr',
                                   club_hr = '$club_hr' WHERE year = $year";

         DB::select($sql2);
        }
        return view('Model.setting', compact('admin')); 
        
    }

    public function set_edit($year){
        
        $admin = \Auth::getUser();
        // get all data.
        $sql = "SELECT * FROM setting WHERE year = $year";
        $fac_data = DB::select($sql);

        
        //dd($student_data);  
        $fac_data =$this->arrayMap($fac_data);
        $fac_data = $fac_data[0];
        return view('Model.Edit.edit_set', compact('admin'))->with("fac_data",$fac_data);
    }

    public function setedit(){

        $admin = \Auth::getUser();
        $year                   = Input::get('year');
        $fac_hr                 =Input::get('fac_hr');
        $dept_hr                =Input::get('dept_hr');
        $club_hr                =Input::get('club_hr');

        


        $sql = "UPDATE setting SET 
                                   fac_hr = '$fac_hr',
                                   dept_hr = '$dept_hr',
                                   club_hr = '$club_hr' WHERE year = $year";

         DB::select($sql);
         return view('Model.setting', compact('admin'));
    }
    
}
   	  
 ?>