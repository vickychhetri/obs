<?php

namespace App\Exports;

use App\Models\attempttest;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\questionbank;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use App\Models\Lockunlockmodule;
// use App\Models\Testcomplete;
use App\Models\testModule;
// use App\Models\Testseq;
// use App\Models\Maximumtest;
class UsersTestReportExport implements FromCollection, WithHeadings
{
    protected $UserID;
    protected $testMode;
    protected $TestIDs;


    function __construct($id,$testMode,$testID) {
        $this->UserID = $id;
        $this->TestType = $testMode;
        $this->TestIDs = $testID;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ReportData=attempttest::where('TestType','=',$this->TestType)
        ->where('TestID','=',$this->TestIDs)
        ->where('UserID','=',$this->UserID)
        ->get();
    
        if($ReportData->count()>0){

        $TestName=testModule::where('TestID','=',$this->TestIDs)
        ->get()
        ->first();  
        $SumTotalCorrectAnswer=0;
        foreach($ReportData as $reportQuestion){
        
            $QuestionBank=questionbank::where('TestID','=',$this->TestIDs)
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
                "AnswerCorrect"=> $Answer,
                'TestName' => $TestName->testName,
                'TestDescription'=>$TestName->testDescription,
                'TotalQuestion'=>$ReportData->count(),
                'TotalCorrect'=>$SumTotalCorrectAnswer,
                    ];
        }   
   

    }
    return collect($QuestionListData);
    }
    public function headings() :array
    {
        return ["QID","Selected Answer","Correct Answer","Question",
        "Selected Option Answer","Is Answer Correct(1=yes)","Test Name","Test Description",
        "Total Question","Total Correct Sequence(Last Value in column is Final)"];
    }
}
