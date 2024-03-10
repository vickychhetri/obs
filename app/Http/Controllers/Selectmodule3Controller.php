<?php

namespace App\Http\Controllers;

use App\Models\Datapasslog;
use App\Models\Lockunlockvideo;
use App\Models\Maincoursestep;
use App\Models\Moreoptions;
use App\Models\Selectmodule3;
use App\Models\Videocomplete;
use App\Models\Videoseq;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Selecttwoattempt;
use Illuminate\Support\Facades\Cache;

class Selectmodule3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($TYPE)
    {
        $UserID = session()->get('userid');
        $agentLocker = new LockunlocksimpletestController;
        $status = $agentLocker->IsLocked($TYPE, $UserID);

        if (!$status) {
            $data2 = Moreoptions::where('TYPE', '=', $TYPE)->get();
//        dd($data2);
            // $UserID=session()->get('userid');
            $data = Selectmodule3::where('TYPE', '=', $TYPE)->get();
            return view('User.userarea.moreMatchColumn')->
            with('ModuleQuestion', $data2)
                ->with('UserID', $UserID)
                ->with('TYPE', $TYPE);
        } else {
            // redirected to start course
            return redirect('/User/Start-Course');
        }
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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateSubmit = Carbon::now();
        $data = array();
        for ($i = 1; $i <= $request->parameter0; $i++) {
            $v = $request["question" . $i];
            $answer = $request["answer" . $v];
            $data[] = [
                'QuestionIDModule' => $v,
                'SelectAnswer' => $answer,
                'QuestionfromtwoTYPE' => $request->parameter1,
                'UserID' => $request->parameter2,
                'created_at' => $dateSubmit,
                'updated_at' => $dateSubmit
            ];
        }

        //   var_dump($data);
        Selecttwoattempt::insert($data);
        $agentLocker = new LockunlocksimpletestController;
        $agentLocker->changeStatus($request->parameter1, "2", $request->parameter2);
        // open next module
        return redirect('/User/Moudle23/Test/Report/' . $request->parameter1);
    }


    public function reportGenerate($TestType)
    {
        $UserID = session()->get('userid');
        if ($TestType == "2") {
            $ReportData = Selecttwoattempt::where('QuestionfromtwoTYPE', '=', $TestType)
                ->where('UserID', '=', $UserID)
                ->latest()
                ->get();
        } else if ($TestType == "3") {
            $ReportData = Selecttwoattempt::where('QuestionfromtwoTYPE', '=', $TestType)
                ->where('UserID', '=', $UserID)
                ->latest()
                ->take(10)
                ->get();
        } else {
            $ReportData = Selecttwoattempt::where('QuestionfromtwoTYPE', '=', $TestType)
                ->where('UserID', '=', $UserID)
                ->latest()
                ->take(10)
                ->get();
        }


        if ($ReportData->count() > 0) {
            $SumTotalCorrectAnswer = 0;
            foreach ($ReportData as $reportQuestion) {

                $QuestionBank = Moreoptions::where('id', '=', $reportQuestion->QuestionIDModule)
                    ->get()
                    ->first();
//            $QuestionBankAnswer=Moreoptions::where('id','=',$QuestionBank->Correct)
//            ->get()
//            ->first();
//            $QuestionBankSelectedAnswer=Moreoptions::where('id','=',$reportQuestion->SelectAnswer)
//            ->get()
//            ->first();

                $Answer = 0;
                if ($reportQuestion->SelectAnswer == $QuestionBank->answer) {
                    $Answer = 1;
                }
                $SumTotalCorrectAnswer = $SumTotalCorrectAnswer + $Answer;

                $QuestionListData[] = [
                    "QuestionID" => $reportQuestion->QuestionIDModule,
                    "SelectedAnswer" => $reportQuestion->SelectAnswer,
                    "CorrectAnswer" => $QuestionBank->Correct,
                    "Question" => $QuestionBank->Options,
                    "AnswerCorrect" => $Answer,
                    "AnswerValue" => $QuestionBank->answer,
                    "SelectedAnswerValue" => $reportQuestion->SelectAnswer
                ];
            }

            $data = [
                'TestName' => $TestType,
                'TotalQuestion' => $ReportData->count(),
                'TotalCorrect' => $SumTotalCorrectAnswer,
                'QuestionTestReport' => $QuestionListData
            ];

            // DATA PASS LOG
            $result = $SumTotalCorrectAnswer * ($ReportData->count() / 100);
            $d = new Datapasslog;
            $d->TYPE = "VT";
            $d->data_report = json_encode($data);
            $d->result = $result;
            $d->pass_status = $result >= 0.5 ? 'PASSED' : 'FAILED';
            $d->UserID = $UserID;
            $d->test_number = $TestType;
            $d->save();



            return view('User.userarea.testModule2Report')
                ->with('TestReportDataset', $data);
        } else {
            return redirect('/User/Start-Course');
        }
    }



    public function storeComplete($aVS)
    {
        try {

            $videoCodeSe=0;
            $UserID=session()->get('userid');
            $VideoID=$aVS;
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

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Selectmodule3 $selectmodule3
     * @return \Illuminate\Http\Response
     */
    public function show(Selectmodule3 $selectmodule3)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Selectmodule3 $selectmodule3
     * @return \Illuminate\Http\Response
     */
    public function edit(Selectmodule3 $selectmodule3)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Selectmodule3 $selectmodule3
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Selectmodule3 $selectmodule3)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Selectmodule3 $selectmodule3
     * @return \Illuminate\Http\Response
     */
    public function destroy(Selectmodule3 $selectmodule3)
    {
        //
    }
}
