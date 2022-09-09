<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\attempttest;
use App\Models\questionbank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lockunlockmodule;
use App\Models\Testcomplete;
use App\Models\testModule;
use App\Models\Testseq;
use App\Models\Maximumtest;
use App\Http\Controllers\Watchtutorial;
use App\Models\Maincoursestep;
use App\Http\Controllers\MaincoursestepController;

use App\Models\Userfeedcomplete;
class AttempttestController extends Controller
{   
    public function isPreOrPost($testID){
        $obj=new AttempttestController();
        $TestMode=$obj->findStep();
        
        $TestType="PRE";

        if($TestMode==1){
            $TestType="PRE";
        }  
        if($TestMode==2){
            $TestType="POST";
        }
     
        $UserID=session()->get('userid');
    //Older code if required than need to use again 22-01-2022 : Vicky chhetri
        // $datasetComplete=Testcomplete::where('TestID','=',$testID)
        // ->where('UserID','=',$UserID)
        // ->get()
        // ->first();
    
        // if(!isset($datasetComplete)){
        //         $TestType="PRE";
        // }else{
        //     if($datasetComplete->complete==0){
        //         $TestType="PRE";
        //     }else if($datasetComplete->complete==1) {
        //         $TestType="POST";
        //     }else if($datasetComplete->complete==3) {
        //         //incomplete Pre
        //         $TestType="PRE";
        //     }else if($datasetComplete->complete==4) {
        //         //incomeplete post
        //         $TestType="POST";
        //     }
            
        // }
        return $TestType;
    }

    public function isTestLocked($testID){
        $unlock=0;
        $UserID=session()->get('userid');
        $obj=new AttempttestController();
        $TestMode=$obj->findStep();
        $unlockValue=Lockunlockmodule::where('ContentType','=',$TestMode)
        ->where('unLock','=','1')
        ->where('ContentID','=',$testID)
        ->where('UserID','=',$UserID)
        ->get()
        ->first();

        if(isset($unlockValue)){
            if($unlockValue->unLock==1){
                $unlock=1;
            }else {
                $unlock=0;
            }
        }else {
            $unlock=0;
        }
        return $unlock;
    }

    
    public function TestLocked($testID,$type,$lock){
       $UserID=session()->get('userid');
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($testID)
    {
        $obj=new AttempttestController();
        $unlock=$obj->isTestLocked($testID);
        if($unlock==0){
            return redirect('/User/list-Test');
        }

        $TestType=$obj->isPreOrPost($testID);

        $dataset = DB::table('test_modules')
        ->join('questionbanks', 'test_modules.TestID', '=', 'questionbanks.TestID')
        ->select('questionbanks.*', 'test_modules.*')
        ->where('questionbanks.TestID', '=', $testID)
        ->get();

        Session()->put('QuestData',$dataset);
        Session()->put('TestType',$TestType);

        return view('User.userarea.question')
        ->with('Quest',$dataset)
        ->with('TestType',$TestType)
        ->with('noQ',$dataset->count());
    }
    
    public function start_test($testID)
    {       
        $obj=new AttempttestController();
        $TestType=$obj->isPreOrPost($testID);

        $unlock=$obj->isTestLocked($testID);
        if($unlock==0){
            return redirect('/User/list-Test');
        }
        $dataset = DB::table('test_modules')
        ->join('questionbanks', 'test_modules.TestID', '=', 'questionbanks.TestID')
        ->select('questionbanks.*', 'test_modules.*')
        ->where('questionbanks.TestID', '=', $testID)
        ->get();

        if($dataset->count()>0) {
        return view('User.userarea.startTest')
        ->with('test',$dataset)
        ->with('TestType',$TestType)
        ->with('noQ',$dataset->count());
        }else {
            return view('User.userarea.startTestNil')
            ->with('TestID',$testID);
        }
    }
    
    public function findStep(){
        $UserID=session()->get('userid');
        
        $step1=Maincoursestep::where('Step','=','1')->where('Complete','=','1')->where('UserID','=',$UserID)->get()->first();
        $step2=Maincoursestep::where('Step','=','2')->where('Complete','=','1')->where('UserID','=',$UserID)->get()->first();
        $step3=Maincoursestep::where('Step','=','3')->where('Complete','=','1')->where('UserID','=',$UserID)->get()->first();
        $TestMode="1";
        if(isset($step1)){
            $TestMode="2";
            if(isset($step2)){
                $TestMode="3";
                if(isset($step3)){
                     // no need to give test 
                     // redirect to game over
                }
            }   

        }
         
        return $TestMode;
    }

    public function list_test()
    {
        $UserID=session()->get('userid');
        $obj=new AttempttestController();
        // if All test complete than redirect to thank you : Test Over 
        $MainCourseStep= new MaincoursestepController;
        if($MainCourseStep->AllStepCompleted()){
          
            $UserFeedBack=Userfeedcomplete::where('UserID','=',$UserID)
            ->where('Complete','=','1')
            ->get()
            ->first();
            if(isset($UserFeedBack)){
                if($UserFeedBack->Complete=="1"){
                    return redirect('thank-you');
                }else {
                    return redirect('/User/Feedback');
                }
            }else{   
                return redirect('/User/Feedback');
            }
            // check if feedback completed or not : if completed than open thank you else 
            //open feedback form
        }
        $TestMode=$obj->findStep();
        //  print_r($TestMode);
        $a = array();
        $dataset = DB::table('test_modules')
        ->join('chapters', 'test_modules.ChapterID', '=', 'chapters.ChapterID')
        ->select('chapters.*', 'test_modules.*')
        ->where('chapters.ChapterID', '=', 1)
        ->get();

        foreach($dataset as $dt){
            $unlockValue=Lockunlockmodule::where('ContentType','=',$TestMode)
            ->where('unLock','=','1')
            ->where('ContentID','=',$dt->TestID)
            ->where('UserID','=',$UserID)
            ->get()
            ->first();
            if($unlockValue){
                $a[$dt->TestID] = $unlockValue->unLock;
            }else {
                $a[$dt->TestID] = 0;
            }
        }
        //  print_r($a);
        return view('User.userarea.listTest')
        ->with('tests',$dataset)
        ->with('noT',$dataset->count())
        ->with('unLocked',$a);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    function Complete_Test_Updates($TestIDs,$CompleteType){
        $UserID=session()->get('userid');
        
        $obj=new AttempttestController();  //object to handle function
        // echo $obj->isPreOrPost($TestIDs)."partofthe testnotattemp";
        $datasetComplete=Testcomplete::where('UserID','=',$UserID)
        ->where('TestID','=',$TestIDs)
        ->where('TypeCategory','=',$obj->isPreOrPost($TestIDs))
        ->get()
        ->first();
    
        if(isset($datasetComplete)){

        if($datasetComplete->count()>0){
            $datasetComplete->Complete=$CompleteType;
            $datasetComplete->save();
            }
            else{
                $agent=new Testcomplete;
                $agent->TypeCategory=$obj->isPreOrPost($TestIDs);
                $agent->TestID=$TestIDs;
                $agent->Complete=$CompleteType;
                $agent->UserID=$UserID;
                $agent->save();
            }
        }
            else{
            $agent=new Testcomplete;
            $agent->TypeCategory=$obj->isPreOrPost($TestIDs);
            $agent->TestID=$TestIDs;
            $agent->Complete=$CompleteType;
            $agent->UserID=$UserID;
            $agent->save();
            // print("store");

        }
return $datasetComplete;
    }

    public function TestNotAttempt_Incomplete($TestIDs){
        $UserID=session()->get('userid');
        
        $obj=new AttempttestController();  //object to handle function
        // echo $obj->isPreOrPost($TestIDs)."partofthe testnotattemp";
        $datasetComplete=$obj->Complete_Test_Updates($TestIDs,'2');
        // $datasetComplete=Testcomplete::where('UserID','=',$UserID)->where('TestID','=',$TestIDs)->where('TypeCategory','=',$obj->isPreOrPost($TestIDs))->get()->first();
    
        // if(isset($datasetComplete)){

        // if($datasetComplete->count()>0){
        //     $datasetComplete->Complete='2';
        //     $datasetComplete->save();
        //     }
        //     else{
        //         $agent=new Testcomplete;
        //         $agent->TypeCategory=$obj->isPreOrPost($TestIDs);
        //         $agent->TestID=$TestIDs;
        //         $agent->Complete='2';
        //         $agent->UserID=$UserID;
        //         $agent->save();
        //     }
        // }
        //     else{
        //     $agent=new Testcomplete;
        //     $agent->TypeCategory=$obj->isPreOrPost($TestIDs);
        //     $agent->TestID=$TestIDs;
        //     $agent->Complete='2';
        //     $agent->UserID=$UserID;
        //     $agent->save();
        //     // print("store");

        // }

        
        //update Test Complete
        $TestTypeForStore=1;
        if($obj->isPreOrPost($TestIDs)=="PRE"){
            $TestTypeForStore=1;
        }else if($obj->isPreOrPost($TestIDs)=="POST"){
            $TestTypeForStore=2;
        }else {
            $TestTypeForStore=3;
        }

        // echo $TestTypeForStore;
        $obj->TestLocked($TestIDs,$TestTypeForStore,'1');   // lock current test         
        $testcurrent=Testseq::where('TestID','=',$TestIDs)->get()->first(); // find current seq
        $testcurrent1=Testseq::where('Sequence','=',$testcurrent->Sequence+1)->get()->first(); // find next test seq

        //test open next if not completed else if already test given  no need to open it.: locked
        if(isset($testcurrent1)){
            if((!$obj->IsTestIsComplete($testcurrent1->TestID,$TestTypeForStore))){
                $obj->TestLocked($testcurrent1->TestID,$TestTypeForStore,'1'); //update
            }
           
        }
    
        return redirect('/User/list-Test')->with('Error',"Incomplete test");

    }

    public function IsTestIsComplete($TestIDs,$TestTypeForStore){
        $UserID=session()->get('userid');
        print($TestTypeForStore);
        $datasetComplete=Testcomplete::where('UserID','=',$UserID)
        ->where('TestID','=',$TestIDs)
        ->where('TypeCategory','=',$TestTypeForStore)
        ->get()
        ->first();
        if(isset($datasetComplete)){
            if($datasetComplete->Complete==1){
                return true;
            }
        }
      
        return false;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questionData=session()->get('QuestData');
        $TestType=session()->get('TestType');
        $UserID=session()->get('userid');
        $dateSubmit = Carbon::now();
        $TestIDs=0;
        $i=1;
                foreach($questionData as $questionD){
                $data[] = [
                            'TestType' => $TestType,
                            'TestID' =>$questionD->TestID,
                            'QuestionID' => $questionD->QuestionID,
                            'selectedAnswer' => $request["optionSelected".$i],
                            'UserID' =>$UserID,
                            'created_at'=>$dateSubmit,
                            'updated_at'=>$dateSubmit
                        ];
            $i++;
            $TestIDs=$questionD->TestID;
              }
           
            attempttest::insert($data);
            $obj=new AttempttestController();  //object to handle function
            $obj->Complete_Test_Updates($TestIDs,'1');
            //update Test Complete  : Hide because test code not working for post and pre 
            // $agent=new Testcomplete;
            // $agent->TypeCategory=$obj->isPreOrPost($TestIDs);
            // $agent->TestID=$TestIDs;
            // $agent->Complete='1';
            // $agent->UserID=$UserID;
            // $agent->save();

            $obj=new AttempttestController();
            $TestMode=$obj->findStep();
            
            $obj->TestLocked($TestIDs,$TestMode,'0');   // lock current test         
            $testcurrent=Testseq::where('TestID','=',$TestIDs)->get()->first(); // find current seq
            $testcurrent1=Testseq::where('Sequence','=',$testcurrent->Sequence+1)->get()->first(); // find next test seq
            
            if(isset($testcurrent1)){
            $obj->TestLocked($testcurrent1->TestID,$TestMode,'1'); //update
            }
            //update course status : 1 specify the chapter 
            $ChapterID=env("CHAPTERIDCODE");
            $obj->UpdateCourseStep($ChapterID,$TestMode);
         return redirect('/User/Test/reportAfterTest/'.$TestIDs.'/'. $TestType);
    }


    // when all test complete change mode to post and update the table
    // that step q PRE section is complete

    //Maximumtest

    public function UpdateCourseStep($chapterID,$TestMode){
        //$number Maximum number of test
        $UserID=session()->get('userid'); //Login User
        // $obj=new AttempttestController();
        // $TestMode=$obj->findStep();  //Current Step
        // check user $number test complete of current step
        $TotalTestObj=Maximumtest::where('ChapterID','=',$chapterID)->get()->first();
        $totalTest=$TotalTestObj->TotalTest;// Know How many test need to complete in chapter
        
        $CATEGORY="PRE";
        if($TestMode==1){
            $CATEGORY="PRE";
        }else if($TestMode==2){
            $CATEGORY="POST";
        }
        $TestCompleteStatus=Testcomplete::where('UserID','=',$UserID)
        ->where('TypeCategory','=',$CATEGORY)
        ->where('Complete','=','1')->get();

        // All test Complete or Not
        if($TestCompleteStatus->count()==$totalTest || ($CATEGORY=="POST" && ($TestCompleteStatus->count()==$totalTest-1))){
            $agentUpdatingStep=new Maincoursestep;
            $agentUpdatingStep->Step=$TestMode;
            $agentUpdatingStep->Complete="1";
            $agentUpdatingStep->ChapterID=$chapterID;
            $agentUpdatingStep->UserID=$UserID;
            $agentUpdatingStep->save();
            //if pre than open video section 
            if($CATEGORY=="PRE"){
               $objectHandleVideo= new Watchtutorial;
               $VideoID=$objectHandleVideo->FirstSequenceVideo();
               $objectHandleVideo->UnlockVideo("1",$VideoID,$UserID);
            //    return redirect('/User/Tutorial/Watch/')->with("message","Welcome to the Tutorial Section.");
            }
        return true;
        }
 return false;
    }
    public function reportGenerate($TestIDs,$TestType){
        $UserID=session()->get('userid');

        $ReportData=attempttest::where('TestType','=',$TestType)
        ->where('TestID','=',$TestIDs)
        ->where('UserID','=',$UserID)
        ->get();
    
        if($ReportData->count()>0){

        $TestName=testModule::where('TestID','=',$TestIDs)
        ->get()
        ->first();  
        $SumTotalCorrectAnswer=0;
        foreach($ReportData as $reportQuestion){
        
            $QuestionBank=questionbank::where('TestID','=',$TestIDs)
            ->where('QuestionID','=',$reportQuestion->QuestionID)
            ->get()
            ->first();
            
            $Answer=0;
            if($reportQuestion->selectedAnswer==$QuestionBank->correctAnswer){
                $Answer=1;
            }
            $SumTotalCorrectAnswer= $SumTotalCorrectAnswer+$Answer;
            // print($SumTotalCorrectAnswer."<br/>");
            $selectedOptionAnswer="-1";
            switch($reportQuestion->selectedAnswer){
            case 1:
                $selectedOptionAnswer=$QuestionBank->optionA;
                break;
            case 2:
                $selectedOptionAnswer=$QuestionBank->optionB;
                break;
            case 3:
                $selectedOptionAnswer=$QuestionBank->optionC;
                break;
            case 4:
                $selectedOptionAnswer=$QuestionBank->optionD;
                break;
            default:
            $selectedOptionAnswer="-1"; 
            }

            $QuestionListData[]=[
                "QuestionID"=>$reportQuestion->QuestionID,
                "SelectedAnswer"=>$reportQuestion->selectedAnswer,
                "CorrectAnswer"=>$QuestionBank->correctAnswer,
                "Question"=>$QuestionBank->question,
                "SelectedOptionAnswer"=>$selectedOptionAnswer,
                "AnswerCorrect"=> $Answer
                    ];
        }
  
            $data=[
                'TestName' => $TestName->testName,
                'TestDescription'=>$TestName->testDescription,
                'TotalQuestion'=>$ReportData->count(),
                'TotalCorrect'=>$SumTotalCorrectAnswer,
                'QuestionTestReport'=>$QuestionListData
            ]; 

        // var_dump($data);
 
        return view('User.userarea.reportTest')
        ->with('TestReportDataset',$data);
        }else {
            return redirect('/User/list-Test')->with('Error',"No Report Available");
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attempttest  $attempttest
     * @return \Illuminate\Http\Response
     */
    public function show(attempttest $attempttest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attempttest  $attempttest
     * @return \Illuminate\Http\Response
     */
    public function edit(attempttest $attempttest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attempttest  $attempttest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attempttest $attempttest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attempttest  $attempttest
     * @return \Illuminate\Http\Response
     */
    public function destroy(attempttest $attempttest)
    {
        //
    }
}