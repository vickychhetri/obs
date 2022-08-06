<?php

namespace App\Http\Controllers;

use App\Models\Moreoptions;
use App\Models\Selectmodule3;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Selecttwoattempt;

class Selectmodule3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($TYPE)
    {
        $UserID=session()->get('userid');    
        $agentLocker=new LockunlocksimpletestController;
        $status=$agentLocker->IsLocked($TYPE,$UserID);

        if(!$status){ 
        $data2=Moreoptions::where('TYPE','=',$TYPE)->get();
        // $UserID=session()->get('userid');
        $data=Selectmodule3::where('TYPE','=',$TYPE)->get();
        return view('User.userarea.moreMatchColumn')->
        with('ModuleQuestion',$data)
        ->with('UserID',$UserID)
        ->with('TYPE',$TYPE) 
        ->with('Options',$data2);
        }else {
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateSubmit = Carbon::now();
        $data=array();
        for($i=1;$i<=$request->parameter0;$i++){
            $v=$request["question".$i];
            $answer=$request["answer".$v];
                $data[] = [
                            'QuestionIDModule' => $v,
                            'SelectAnswer' =>$answer,
                            'QuestionfromtwoTYPE' => $request->parameter1,
                            'UserID' =>$request->parameter2,
                            'created_at'=>$dateSubmit,
                            'updated_at'=>$dateSubmit
                        ];
                        // echo "ss".$request->parameter0 . "uu<br/>";
                        // echo "1".$request->parameter1 . "uu<br/>";
                        // echo "eee".$request->parameter2 . "uu<br/>";
              }
           
            //   var_dump($data);
              Selecttwoattempt::insert($data);
              $agentLocker=new LockunlocksimpletestController;
              $agentLocker->changeStatus($request->parameter1,"2",$request->parameter2);
            // open next module
            return redirect('/User/Moudle23/Test/Report/'.$request->parameter1);
    }


    public function reportGenerate($TestType){
        $UserID=session()->get('userid');
        if($TestType=="2"){
            $ReportData=Selecttwoattempt::where('QuestionfromtwoTYPE','=',$TestType)
            ->where('UserID','=',$UserID)
            ->latest()
            ->take(5)
            ->get();
        } else  if($TestType=="3"){
            $ReportData=Selecttwoattempt::where('QuestionfromtwoTYPE','=',$TestType)
            ->where('UserID','=',$UserID)
            ->latest()
            ->take(4)
            ->get();
        }
      
    
        if($ReportData->count()>0){
        $SumTotalCorrectAnswer=0;
        foreach($ReportData as $reportQuestion){
        
            $QuestionBank=Selectmodule3::where('id','=',$reportQuestion->QuestionIDModule)
            ->get()
            ->first();
            $QuestionBankAnswer=Moreoptions::where('id','=',$QuestionBank->Correct)
            ->get()
            ->first();
            $QuestionBankSelectedAnswer=Moreoptions::where('id','=',$reportQuestion->SelectAnswer)
            ->get()
            ->first();
            
            $Answer=0;
            if($reportQuestion->SelectAnswer==$QuestionBank->Correct){
                $Answer=1;
            }
            $SumTotalCorrectAnswer= $SumTotalCorrectAnswer+$Answer;
             
            $QuestionListData[]=[
                "QuestionID"=>$reportQuestion->QuestionIDModule,
                "SelectedAnswer"=>$reportQuestion->SelectAnswer,
                "CorrectAnswer"=>$QuestionBank->Correct,
                "Question"=>$QuestionBank->Section3, 
                "AnswerCorrect"=> $Answer,
                "AnswerValue"=>$QuestionBankAnswer->Options,
                "SelectedAnswerValue"=>$QuestionBankSelectedAnswer->Options
                    ];
        }
  
            $data=[
                'TestName' => $TestType, 
                'TotalQuestion'=>$ReportData->count(),
                'TotalCorrect'=>$SumTotalCorrectAnswer,
                'QuestionTestReport'=>$QuestionListData
            ]; 

        // var_dump($data);
        // }
        return view('User.userarea.testModule2Report')
        ->with('TestReportDataset',$data);
        }else {
            return redirect('/User/Start-Course');
        }
    }
  


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Selectmodule3  $selectmodule3
     * @return \Illuminate\Http\Response
     */
    public function show(Selectmodule3 $selectmodule3)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Selectmodule3  $selectmodule3
     * @return \Illuminate\Http\Response
     */
    public function edit(Selectmodule3 $selectmodule3)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Selectmodule3  $selectmodule3
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Selectmodule3 $selectmodule3)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Selectmodule3  $selectmodule3
     * @return \Illuminate\Http\Response
     */
    public function destroy(Selectmodule3 $selectmodule3)
    {
        //
    }
}
