<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/forgot', function () {
    return view('forgotmessage');
});

   
Route::get('/Admin-Login', 'App\Http\Controllers\AdminuserController@index');
Route::post('/Admin-Login', 'App\Http\Controllers\AdminuserController@checkAdminlogin');

 // Protected group by middleware
Route::group(["middleware" => ["Adminlogchecker"]], function(){
    Route::get('/Add/Course', 'App\Http\Controllers\CourseController@index');
    Route::post('/Add/Course', 'App\Http\Controllers\CourseController@store');
    Route::get('/Add/Subject', 'App\Http\Controllers\SubjectController@index');
    Route::post('/Add/Subject', 'App\Http\Controllers\SubjectController@store');   
    Route::get('/Add/Chapter', 'App\Http\Controllers\ChapterController@index');
    Route::post('/Add/Chapter', 'App\Http\Controllers\ChapterController@store');

    Route::get('/Dashboard', function () {

    

        return view('Admin.dashboard');
    });    

    Route::get('/Dashboard', 'App\Http\Controllers\AdminuserController@openDashboard');
    Route::get('/List-User', 'App\Http\Controllers\LoginuserController@show_Users_register');
    Route::get('/List-User-report', 'App\Http\Controllers\LoginuserController@show_Users_register_report');
    
    Route::get('/OpenUserReport/{UserID}', 'App\Http\Controllers\LoginuserController@show_Users_register_report_single');
        Route::get('/Admin/Set/Video/Seen/{UserID}', 'App\Http\Controllers\LoginuserController@seen_all_videos');
    

    Route::get('/approvedUser/{UserID}', 'App\Http\Controllers\LoginuserController@enableUser');
    Route::get('/disableUser/{UserID}', 'App\Http\Controllers\LoginuserController@disableUser');
    
    Route::get('/User/Total', 'App\Http\Controllers\ExportExcelController@export');
    Route::get('/User/Demographic/{UserID}', 'App\Http\Controllers\ExportExcelController@exportDemoData');
    
    Route::get('/User/Export/Test/{UserID}/{Mode}', 'App\Http\Controllers\ExportExcelController@exportTestData'); 
    
    Route::get('/User/Export/TestReport/{UserID}/{Mode}/{TESTID}', 'App\Http\Controllers\ExportExcelController@exportReportData'); 
   
    Route::get('/User/FeedbackGenerate/{UserID}', 'App\Http\Controllers\ExportExcelController@exportfeedbackData');
    Route::get('/User/FeedbackGenerateAllN-Now', 'App\Http\Controllers\ExportExcelController@exportfeedbackDataAll');
    
         
    Route::get('/User/Test/OpenPostTest/{UserID}', 'App\Http\Controllers\AjaxController@OpenPosttest'); 
    Route::get('/User/Export/TestReportAllOnce/{Mode}/{TESTID}', 'App\Http\Controllers\ExportExcelController@exportReportDataALL'); 
    Route::get('/Full-Reports-Generate-Now', function () {
        return view('Admin.allFullDetailReport');
    });

});





//User
Route::get('/Register', 'App\Http\Controllers\LoginuserController@index');

Route::post('/Register', 'App\Http\Controllers\LoginuserController@store');

Route::get('/Login', function () {
    return view('login');
});

// Forgot or logout session 
Route::get('/noaccess', function () {
    Session()->forget('username');
    Session()->forget('userid');
    Session()->forget('password');
    Session()->flush();
    return redirect("/Login")->with('message', ' User is logged out !');
});

// Forgot or logout session 
Route::get('/noaccess2', function () {
    Session()->forget('username');
    Session()->forget('userid');
    Session()->forget('PermissionAdmin');
    Session()->forget('password');
    Session()->flush();
    return redirect("/Admin-Login")->with('message', ' Admin user is logged out !');
});


Route::post('/Login', 'App\Http\Controllers\LoginuserController@login_check');





//check register
//if valid open dashboard

// Protected group by middleware
Route::group(["middleware" => ["UserLogChecker"]], function(){
Route::get('/UDashboard', 'App\Http\Controllers\userdasboard@index');

Route::get('/User/Start-Course', 'App\Http\Controllers\userdasboard@courseStart');
Route::get('/User/Demographic', 'App\Http\Controllers\userdasboard@demographics');
Route::post('/User/Demographic', 'App\Http\Controllers\DemograController@store');

Route::get('/User/Test/{testID}', 'App\Http\Controllers\AttempttestController@index');

Route::get('/User/Start-Test/{testID}', 'App\Http\Controllers\AttempttestController@start_test');

Route::get('/User/list-Test', 'App\Http\Controllers\AttempttestController@list_test');
Route::post('/User/Test', 'App\Http\Controllers\AttempttestController@store');
 
Route::get('/User/Test/reportAfterTest/{TestIDs}/{TestType}', 'App\Http\Controllers\AttempttestController@reportGenerate');

Route::get('/User/Test/InCompleteAttemptTest/{TestIDs}', 'App\Http\Controllers\AttempttestController@TestNotAttempt_Incomplete');

Route::get('/User/Tutorial/Watch/', 'App\Http\Controllers\Watchtutorial@StartVideoCourse');
Route::get('/User/Tutorials/Watch/{VideoIDs}', 'App\Http\Controllers\Watchtutorial@LaunchVideo');


Route::get('/testvrs/{Type}/{VideoIDs}/{UserID}/', 'App\Http\Controllers\Watchtutorial@UnlockNextVideo');

Route::get('/User/Tutorial/CourseLocked', function () {
    return view('User.userarea.courseLocked');
});    

Route::get('/thank-you', function () {
    return view('User.userarea.thank');
});  
Route::get('/video', function () {
    return view('User.userarea.tutorial');
});    
Route::post('/Video-Status', 'App\Http\Controllers\AjaxController@store');

Route::post('/VideoCompleted', 'App\Http\Controllers\AjaxController@storeComplete');


//Video Previois: Next


Route::get('/User/Tutorial/Watch/Previous/{VideoIDs}', 'App\Http\Controllers\Watchtutorial@LaunchVideoPrevious');
Route::get('/User/Tutorial/Watch/Next/{VideoIDs}', 'App\Http\Controllers\Watchtutorial@LaunchVideoNext');

Route::get('/User/View/Test', 'App\Http\Controllers\userdasboard@openTestReportList');

Route::get('/User/Feedback', 'App\Http\Controllers\UserfeedbackController@index');
Route::post('/User/Feedback', 'App\Http\Controllers\UserfeedbackuserController@store');

Route::get('/User/Moudle/Test/{TYPE}', 'App\Http\Controllers\SelectfromtwqController@index');
Route::post('/User/Moudle/Test', 'App\Http\Controllers\SelectfromtwqController@store');

Route::get('/User/Moudle/Test/Report/{TYPE}', 'App\Http\Controllers\SelectfromtwqController@reportGenerate');

Route::get('/User/Moudle23/Test/{TYPE}', 'App\Http\Controllers\Selectmodule3Controller@index');
Route::post('/User/Moudle23/Test', 'App\Http\Controllers\Selectmodule3Controller@store');


Route::get('/User/Moudle23/Test/Report/{TYPE}', 'App\Http\Controllers\Selectmodule3Controller@reportGenerate');
//GenerateFeedback Report
Route::get('/User/Test/report/myFeedback', 'App\Http\Controllers\UserfeedbackuserController@UserFeedbackData');


});    

// Protected group by middleware
 