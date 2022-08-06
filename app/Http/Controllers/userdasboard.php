<?php

namespace App\Http\Controllers;
use App\Models\Maincoursestep;
use App\Models\testModule;

use Illuminate\Http\Request;

use App\Models\Demogra;

use App\Http\Controllers\AttempttestController;
use App\Http\Controllers\TestseqController;


class userdasboard extends Controller
{
    public function index()
    {
            return view('User.userarea.dashboard');      
    }
    public function demographics(){
        return view('User.userarea.demographic');     
    }

    public function courseStart(){
        $UserID=session()->get('userid');
        $database_agent2= Demogra::where('UserID','=',$UserID)->get()->first();
        
        if($database_agent2){
        
            $coursestepStatus=Maincoursestep::where('UserID','=',$UserID)
        ->where('Step','=','1')->where('Complete','=','1')
        ->get()
        ->first();

            if(isset($coursestepStatus)){
                if($coursestepStatus->Complete=="1"){
                // if Pre Test Completed than check for Step of Video Section
            $coursestepStatus=Maincoursestep::where('UserID','=',$UserID)
            ->where('Step','=','3')->where('Complete','=','1')
            ->get()
            ->first();
            if(isset($coursestepStatus)){
                // if video section also completed than open Post Test Section
                if($coursestepStatus->Complete=="1"){
                   
                    return redirect('/User/list-Test');
                    // check here of post test completed than redirect to display message 
                }
            }else {
                return redirect('/User/Tutorial/Watch/');   
            }
                 
                }
            }else {
                return redirect('/User/list-Test');

                


            }


        }
       
        return view('User.userarea.demographic');     
    // check if form fill or not 
     // if form filled than start course sequence
     // if already started move to that section 
    }
    public function openTestReportList(){
        $data=testModule::where('ChapterID','=','1')->get();
        return view('User.userarea.viewTest')
        ->with('Tests',$data);  
    }
}