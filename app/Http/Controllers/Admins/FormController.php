<?php namespace App\Http\Controllers\Admins; // กำหนดที่อยู่ของ Controller
use App\Http\Controllers\Controller; //เรียกใช้ Controller หลักของ Laravel 5.0
use Input;
use DB;
use Excel;
 
class FormController extends Controller {


	public function __construct(){
  		$this->middleware('auth');
 	}

 	public function getIndex(){

     $admin = \Auth::getUser();
     
     $department_id= $admin->deparment_id;

 	return view('admin.dashboard.index', compact('admin'));
 	}



 public function getdatailuser(){
  $admin = \Auth::getUser();
 return view('admin.dashboard.detailuser',compact('admin'));
 }

 public function getsetuser(){
    $admin = \Auth::getUser();
 return view('admin.dashboard.setuser',compact('admin'));
 }

 public function getmanualuser(){
  $admin = \Auth::getUser();
 return view('admin.dashboard.manualuser',compact('admin'));
 }

 public function logoutuser(){
 return view('admin.dashboard.logoutuser');
 }

 public function dataexcel(){
 	$admin = \Auth::getUser();
 return view('admin.dashboard.dataexcel',compact('admin'));
 }

 public function report(){
  $admin = \Auth::getUser();
 return view('admin.dashboard.report',compact('admin'));
 }

 public function setpage1(){
  $admin = \Auth::getUser();
 return view('admin.dashboard.set-page1',compact('admin'));
 }

 public function setpage2(){
  $admin = \Auth::getUser();
 return view('admin.dashboard.set-page2',compact('admin'));
 }

 public function setpage3(){
  $admin = \Auth::getUser();
 return view('admin.dashboard.set-page3',compact('admin'));
 }

 public function joinact(){
  $admin = \Auth::getUser();
 return view('admin.dashboard.joinact',compact('admin'));
 }

public function arrayMap($transactions){
		return array_map(function($object){
          return (array) $object;
      }, $transactions);
	}

 public function partexcel(){

 		/*$sql = "SELECT * FROM activity WHERE activity_id = $activity_id";
        $act_data = DB::select($sql);

        
        //dd($student_data);  
        $act_data =$this->arrayMap($act_data);
        $act_data = $act_data[0];
        return view('admin.dashboard.partexcel')->with("act_data",$act_data);*/
        $admin = \Auth::getUser();
 return view('admin.dashboard.partexcel',compact('admin'));
 }

 public function edituser(){
        $admin = \Auth::getUser();


    $id_data        = Input::get('id');
    $first_data     = Input::get('first_name');
    $last_data      = Input::get('last_name');
    $dept_data      = Input::get('department_id');
    $username_data    = Input::get('username');
    $password_data    = Input::get('password');
    $remember_token_data= Input::get('remember_token');
    $created_at_data    = Input::get('created_at');
    $updated_at_data    = Input::get('updated_at');

    $id_data        = $admin->id;
    $dept_data      = $admin->department_id;
    $username_data    = $admin->username;
    $password_data    = $admin->password;
    $remember_token_data= $admin->remember_token;
    $created_at_data    = $admin->created_at;
    $updated_at_data    = $admin->updated_at;
    


    $sql = "UPDATE admins SET 
                   first_name =  '$first_data',
                   last_name = '$last_data',
                   department_id = '$dept_data',
                   username = '$username_data',
                   password = '$password_data',
                   remember_token = '$remember_token_data',
                   created_at = '$created_at_data',
                   updated_at = '$updated_at_data' WHERE id = $id_data ";

     DB::select($sql);

 return view('admin.dashboard.set-page1',compact('admin'));
 }


}
