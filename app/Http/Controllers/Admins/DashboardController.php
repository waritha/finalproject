<?php namespace App\Http\Controllers\Admins; // กำหนดที่อยู่ของ Controller
use App\Http\Controllers\Controller; //เรียกใช้ Controller หลักของ Laravel 5.0
 
class DashboardController extends Controller {

 public function __construct()
 {
  $this->middleware('auth');
 }

 public function getIndex(){

     $admin = \Auth::getUser();
     
     $department_id= $admin->deparment_id;
     
    /* $admin->first_name = 'asdf';
     $admin->last_name= 'jkl';
     $admin->save();*/

 return view('admin.dashboard.index', compact('admin'));
 }

 

}
