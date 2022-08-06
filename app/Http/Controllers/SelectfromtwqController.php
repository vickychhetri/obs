<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Selecttwoattempt;
use App\Models\Selectfromtwq;
use Illuminate\Http\Request;


class SelectfromtwqController extends Controller
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
    //    echo $status;
       if(!$status){
                 // check lock or unlock
                 $data2[0]="Acyanotic";
                 $data2[1]="Cyanotic";
                 $optionSize=2;
         
                 if($TYPE==1){
                     $data2[0]="Acyanotic";
                     $data2[1]="Cyanotic";
                     $optionSize=2;
                 }
                 if($TYPE==5){
                     $data2[0]="TRUE";
                     $data2[1]="FALSE";
                     $optionSize=2;
                 }
               
                 $UserID=session()->get('userid');
                 $data=Selectfromtwq::where('TYPE','=',$TYPE)->get();
                 return view('User.userarea.matchColumn')->
                 with('ModuleQuestion',$data)
                 ->with('UserID',$UserID)
                 ->with('TYPE',$TYPE)
                 ->with('OPTIONS',$data2)
                 ->with('OptionSize',$optionSize);
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
                // echo $i;
                    $data[$i-1] = [
                                'QuestionIDModule' => $v,
                                'SelectAnswer' =>$answer,
                                'QuestionfromtwoTYPE' => $request->parameter1,
                                'UserID' =>$request->parameter2,
                                'created_at'=>$dateSubmit,
                                'updated_at'=>$dateSubmit
                            ];
                  }
               
                  Selecttwoattempt::insert($data);
                  $agentLocker=new LockunlocksimpletestController;
                  $agentLocker->changeStatus($request->parameter1,"2",$request->parameter2);
                // open next module
                  //report
                return redirect('/User/Moudle/Test/Report/'.$request->parameter1);
             
    }

    public function reportGenerate($TestType){
        $UserID=session()->get('userid');
        if($TestType=="1"){
    $ReportData=Selecttwoattempt::where('QuestionfromtwoTYPE','=',$TestType)
    ->where('UserID','=',$UserID)
    ->latest()
    ->take(5)
    ->get();
            }else if($TestType=="5"){
    $ReportData=Selecttwoattempt::where('QuestionfromtwoTYPE','=',$TestType)
    ->where('UserID','=',$UserID)
    ->latest()
    ->take(4)
    ->get();
            }
        // $ReportData=Selecttwoattempt::where('QuestionfromtwoTYPE','=',$TestType)
        // ->where('UserID','=',$UserID)
        // ->take(5)
        // ->get();
    
        if($ReportData->count()>0){
        $SumTotalCorrectAnswer=0;
        foreach($ReportData as $reportQuestion){
        
            $QuestionBank=selectfromtwq::where('id','=',$reportQuestion->QuestionIDModule)
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
                "Question"=>$QuestionBank->ASection, 
                "AnswerCorrect"=> $Answer
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
        return view('User.userarea.testModulereport')
        ->with('TestReportDataset',$data);
        }else {
            return redirect('/User/Start-Course');
        }
    }
  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Selectfromtwq  $selectfromtwq
     * @return \Illuminate\Http\Response
     */
    public function show(Selectfromtwq $selectfromtwq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Selectfromtwq  $selectfromtwq
     * @return \Illuminate\Http\Response
     */
    public function edit(Selectfromtwq $selectfromtwq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Selectfromtwq  $selectfromtwq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Selectfromtwq $selectfromtwq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Selectfromtwq  $selectfromtwq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Selectfromtwq $selectfromtwq)
    {
        //
    }
}