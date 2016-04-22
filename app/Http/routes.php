<?php

//Form backup

// Authentication routes...
Route::get('admin/login', 'Auth\AuthController@getLogin');
Route::post('admin/login', 'Auth\AuthController@postLogin');
Route::get('admin/logout', 'Auth\AuthController@getLogout');

Route::get('admin/register', 'Auth\AuthController@getRegister');
Route::post('admin/register', 'Auth\AuthController@postRegister');

Route::get('admin/index', 'Admins\DashboardController@getIndex');
Route::controller('admin/index','Admins\DashboardController');

Route::get('admin/detailuser',"Admins\FormController@getdatailuser");

Route::get('admin/setuser',"Admins\FormController@getsetuser");
Route::post('/edituser',"Admins\FormController@edituser");


Route::get('admin/manualuser',"Admins\FormController@getmanualuser");
Route::get('admin/logoutuser',"Admins\FormController@logoutuser");

Route::get('admin/dataexcel',"Admins\FormController@dataexcel");

Route::get('admin/report',"Admins\FormController@report");

Route::get('admin/setpage1',"Admins\FormController@setpage1");
Route::get('admin/setpage2',"Admins\FormController@setpage2");
Route::get('admin/setpage3',"Admins\FormController@setpage3");

Route::get('admin/joinact',"Admins\FormController@joinact");

Route::get('admin/partexcel',"Admins\FormController@partexcel");

/*  EX Route::get('part_one/{activity_id}',"Model\ParticipationController@part_one");*/

//link UI

Route::get('datastudent',"Model\StudentController@page_student");

/*Route::get('datastudent', function(){
    return view('Model/student');
});
*/
Route::get('datage_activity',"Model\GEactivityController@page_ge_activitys");
/*Route::get('datage_activity', function(){
    return view('Model/ge_activity');
});*/

Route::get('data_activity',"Model\ActivityController@page_activitys");
/*Route::get('data_activity', function(){
    return view('Model/activity');
});*/

Route::get('data_participation',"Model\ParticipationController@page_data_participation");
/*Route::get('data_participation', function(){
    return view('Model/participation');
});*/

//test student
Route::get('check-connect',function(){
 if(DB::connection()->getDatabaseName())
 {
 return view('student');// return view('student');  PHPExcelReadToMySQL
 }else{
 return 'Connection False !!';
 }
 
});


//test


Route::get('part_one', function(){
    return view('Model/part_one');
});


Route::get('testlist', function(){
    return view('testlistpart');
});


//  end test student






//Start table student
/*Route::get('student', function(){
    return view('student');
});*/

Route::get('studentform',"Model\StudentController@form"); //rigth!!!
Route::post('add/',"Model\StudentController@addStudent");

Route::get('edit/{student_id}',"Model\StudentController@editStudent");

Route::post('edit',"Model\StudentController@updateStudent");

Route::get('delete/{student_id}',"Model\StudentController@deleteStudent");

Route::get('search/student',function(){
	$keyword = trim(Input::get('keyword'));
	return view('Model/result_search_student')->with("keyword",$keyword);
});

//Route::post('del',"StudentController@del");






//End !!

//Start table GE_activity
/*Route::get('ge_activity', function(){
    return view('ge_activity');
});
*/
Route::post('ge_activity_1',"Model\GEactivityController@ge_activity_1");

Route::get('geform',"Model\GEactivityController@geform"); 
Route::post('addge',"Model\GEactivityController@addge");

Route::get('editge/{ge_id}',"Model\GEactivityController@editActivity");
Route::post('editge',"Model\GEactivityController@updateActivity");

Route::get('deletege/{ge_id}/{year}',"Model\GEactivityController@deleteActivity");
Route::post('delge',"Model\GEactivityController@delge");

//END!!



//Start Activity
/*Route::get('activity', function(){
    return view('activity');
});*/
Route::get('actform',"Model\ActivityController@form");
Route::post('addact',"Model\ActivityController@addActivity");

Route::post('editact',"Model\ActivityController@updateActivity");
Route::get('editact/{activity_id}',"Model\ActivityController@editactivity");

Route::get('deleteact/{activity_id}',"Model\ActivityController@deleteactivity");
//Route::post('del',"ActivityController@del");


//Route::get('testexcel',"ExcelController@testExcel");




//END!!


//Start Participation
//Route::get('selectpart/{activity_id}',"Model\ParticipationController@selectpart");  เสีย

Route::get('partselect/{activity_id}',"Model\ParticipationController@partselect");

//test part_one
Route::get('part_one/{activity_id}',"Model\ParticipationController@part_one");


Route::post('addpart/{activity_id}',"Model\ParticipationController@addToPart");

Route::get('viewdetail/{activity_id}',"Model\ParticipationController@viewdetail");

Route::post('addpart_one/{activity_id}',"Model\ParticipationController@addPartOne");

Route::get('delpart/{student_id}/{act_id}',"Model\ParticipationController@delpart");
//END!!


// Start Report Student
Route::get('report_student',"Model\ReportController@page_report_student");

/*Route::get('report_student', function(){
    return view('Model/report_student');
});*/

Route::get('detail_stu/{student_id}',"Model\ReportController@detail_stu");
//END Report Student!!

//Start setting 
Route::get('setting',"Model\SettingController@page_setting");
/*Route::get('setting', function(){
    return view('Model/setting');
});*/

Route::get('set_del/{year}',"Model\SettingController@set_del");
Route::get('addformsetting',"Model\SettingController@addformsetting");
Route::post('addset',"Model\SettingController@addsetting");
Route::get('set_edit/{year}',"Model\SettingController@set_edit");
Route::post('setedit',"Model\SettingController@setedit");
//END setting!!

// Start Report Activity
Route::get('report_activity',"Model\ReportController@page_report_activity");
/*Route::get('report_activity', function(){
    return view('Model/report_activity');
});*/

Route::get('detail_act/{activity_id}',"Model\ReportController@detail_act");
//END Report Activity!!

// Start Report Conclude
Route::get('report_conclude',"Model\ReportController@page_report_conclude");
/*Route::get('report_conclude', function(){
    return view('Model/report_conclude');
});*/

Route::post('data_report',"Model\ReportController@data_report");
/*Route::get('data_report/{year}/{semester_ge}',"Model\ReportController@data_report");*/

/*Route::get('delpart/{student_id}/{act_id}',"Model\ReportController@delpart");*/

/*Route::get('detail_act/{activity_id}',"Model\ReportController@detail_act");

 <a class="btn btn-default" href="{{ url('delpart/'.$student_id. '/' .$act_id) }}" role="button" onclick="return confirm('คุณแน่ใจนะว่าต้องการที่จะลบ?')">ลบ</a>


*/


//END Report Conclude!!
