<?php

namespace App\Http\Controllers;
use App\Models\Videocomplete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Lockunlockmodule;
use App\Models\videoModule;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Videoseq;
use App\Models\Lockunlockvideo;
use App\Models\Maincoursestep;
use App\Http\Controllers\TestseqController;
use App\Http\Controllers\Watchtutorial;
use Exception;

class AjaxController extends Controller
{

    public function store(Request $request)
    {
        $UserID=$request->aUS;
        $VideoID=$request->aVS;
        $currentTime=$request->aTS;
        $key=$VideoID."@".$UserID;
        Cache::forever($key,$currentTime);
         return response()->json(['success'=>'done']);
    }
    public function storeComplete(Request $request)
    {
        try {

        $videoCodeSe=0;
        $UserID=session()->get('userid');
        $VideoID=$request->aVS;
        $key=$VideoID."@".$UserID;
        $complete=1;
        $completeStatus=Videocomplete::where('VideoID','=',$VideoID)
        ->where('UserID','=',$UserID)
        ->get()
        ->first();

        if(isset($completeStatus)){
            $completeStatus->Complete=$complete;
            $completeStatus->save();
        }else {
            $obkAgent= new Videocomplete;
            $obkAgent->VideoID=$VideoID;
            $obkAgent->UserID=$UserID;
            $obkAgent->Complete=$complete;
            $obkAgent->save();
        }

        // unlock next one
        $obj= new Watchtutorial;
        $currentSquence=$obj->VideoToSequenceNo($VideoID);

          // video complete than unlock next small test module
          $agentSimpleTestStatus=new LockunlocksimpletestController;
              $TypeMode=AjaxController::currenVideoTOModuleTest($currentSquence);
              if($TypeMode!=0){
              $agentSimpleTestStatus->changeStatus($TypeMode,"1",$UserID);
            }

        $currentSquence+=1;

        $Video=Videoseq::where('Sequence','=',$currentSquence)->get()->first();
        if(isset($Video)){
            // $videoCodeSe=1;
            $datadump=Lockunlockvideo::where('ContentType','=',"1")
            ->where('VideoID','=',$Video->VideoID)
            ->where('UserID','=',$UserID)
            ->get()
            ->first();

            if(!isset($datadump)){
                // $videoCodeSe=2;
                $obAgent= new Lockunlockvideo;
                $obAgent->ContentType="1";
                $obAgent->VideoID=$Video->VideoID;
                $obAgent->unLock="1";
                $obAgent->UserID=$UserID;
                $obAgent->save();
            }
            else {
                           $datadump->unLock="1";
                           $datadump->save();
                        //    $videoCodeSe=3;
            }
        }

        Cache::forget($key);  // forgot history of timer video resume

        // step to find all video complete or not
        $Video=Videoseq::all();
        $TestComplete=1;
        foreach($Video as $v){
            $status=$obj->IsVideoComplete($v->VideoID,$UserID);

            if(!isset($status)){
                $TestComplete=0;
            }
            if(isset($status)){
            if($status!="1"){
                $TestComplete=0;
            }
        }
        }
        // all video completed  & Update maincourse
        if($TestComplete==1){
            $ChapterID=env("CHAPTERIDCODE");
           $mainCourseStepVideo= Maincoursestep::where('UserID','=',$UserID)
            ->where('ChapterID','=',$ChapterID)
            ->where('Step','=',"3")
            ->get()
            ->first();
            if(isset($mainCourseStepVideo)){
             $mainCourseStepVideo->Complete="1";
            $mainCourseStepVideo->save();
            }else{
                $agentUpdatingStep=new Maincoursestep;
                $agentUpdatingStep->Step="3";
                $agentUpdatingStep->Complete="1";
                $agentUpdatingStep->ChapterID=$ChapterID;
                $agentUpdatingStep->UserID=$UserID;
                $agentUpdatingStep->save();
            }

            #OFF THE AUTOMATIC ON MODE OF THE SECOND TEST: NEED APPROVAL FROM ADMIN
            // unlock post test
            // $TestMode=$obj->findStep();
            // $UserDash=new TestseqController();
            // $testID=$UserDash->SecondTestSequence(); // find the first test
            // $exam= new AttempttestController;
            // $exam->TestLocked($testID,"2","1"); // open post test
        }
        return response()->json(['success'=>$TypeMode]);
    }catch(Exception $e){
        // print_r($e->getMessage());
        // return response()->json(['error'=>$e]);
        // $error = sprintf('[%s],[%d] ERROR:[%s]', __METHOD__, __LINE__, json_encode($e->getMessage(), true));
        // \Log::error($error);
        // return response()->json(['error'=>$error]);

    }
    }
 public static function  currenVideoTOModuleTest($currentSquence){
    switch($currentSquence){
        case "1":
         return 1;
        case "2":
            return 2;
         case "3":
         return 3;
         case "4":
         return "4";
         case "5":
         return "5";
         default:
         return 0;
    }
 }

 //Admin Section to unlock Post test
 public function OpenPosttest($UserID){
    // this fucntion only work if post test open and status
    //is not change or button not prrssed.
    $res_Agent_check = DB::table('postactivateds')
    ->where('UserID', '=', $UserID)
    ->where('PostButtonStatus', '=', '1')
    ->get()
    ->first();

    if(!$res_Agent_check){
//   echo "start function/";
        $obj= new Watchtutorial;
    $Video=Videoseq::all();
    $TestComplete=1;
    foreach($Video as $v){
        $status=$obj->IsVideoComplete($v->VideoID,$UserID);

        if(!isset($status)){
            $TestComplete=0;
        }
        if(isset($status)){
        if($status!="1"){
            $TestComplete=0;
        }
    }
    }

    if($TestComplete==1){
    $UserDash=new TestseqController();
    $testID=$UserDash->SecondTestSequence(); // find the first test
    $PostTest= new AjaxController();
    $PostTest->TestLocked($UserID,$testID,"2","1"); // open post test

    $res_Agent = DB::table('postactivateds')
    ->where('UserID', '=', $UserID)
    ->get()
    ->first();
    $dateSubmit = Carbon::now();
    if($res_Agent){
       DB::table('postactivateds')
        ->where('UserID', '=', $UserID)
        ->update(['PostButtonStatus' => "1",'Message' => "Already Activated",'updated_at'=>$dateSubmit]);
    }else {
        DB::table('postactivateds')->insert([
            'PostButtonStatus' => '1',
            'Message' => 'Already Activated',
            'UserID'=>$UserID,
            'created_at'=>$dateSubmit,
            'updated_at'=>$dateSubmit
        ]);
    }
    // echo "true end";
        //button press and return null
    return redirect()->back()->with("message","Done");
        }
    }
    // echo "End ";
    // if already pressed
// return false;
return redirect()->back()->with("Error","Sorry ");
 }
public function VideoCOmpleted($UserID){
    $obj= new Watchtutorial;
    $Video=Videoseq::all();
    $TestComplete=1;
    foreach($Video as $v){
        $status=$obj->IsVideoComplete($v->VideoID,$UserID);

        if(!isset($status)){
            $TestComplete=0;
        }
        if(isset($status)){
        if($status!="1"){
            $TestComplete=0;
        }
    }
    }
return $TestComplete;
}
 public function TestLocked($UserID,$testID,$type,$lock){
    // $UserID=session()->get('userid');
    $unlockValue=Lockunlockmodule::where('ContentType','=',$type)
     ->where('ContentID','=',$testID)
     ->where('UserID','=',$UserID)
     ->first();
     $res=null;
     if(isset($unlockValue)){
         if($unlockValue->count()>0 && $unlockValue!=null){
             $unlockValue->unLock=$lock;
             $res=$unlockValue->save();
         } else {
             $agentValue=new Lockunlockmodule;
             $agentValue->ContentType=$type;
             $agentValue->ContentID=$testID;
             $agentValue->unLock=$lock;
             $agentValue->UserID=$UserID;
             $res=$agentValue->save();
         }
     }else {
         $agentValue=new Lockunlockmodule;
         $agentValue->ContentType=$type;
         $agentValue->ContentID=$testID;
         $agentValue->unLock=$lock;
         $agentValue->UserID=$UserID;
         $res=$agentValue->save();
     }
     if($res=='1'){
         return true;
     }
     return false;
 }


}
