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
use App\Models\loginuser;
use App\Models\Questionnumber;
// use App\Models\Testseq;
// use App\Models\Maximumtest;

class UserTestExportAll implements FromCollection, WithHeadings
{
    protected $testMode;
    protected $TestIDs;


    function __construct($testMode,$testID) {
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
        ->get();
        
        #I REMOVE THE USER ID CONSTRAINTS FROM THE QUERY ABOVE
        // ->where('UserID','=',$this->UserID)

        if($ReportData->count()>0){
            #GET TEST NAME AND DESCRIPTION
        $TestName=testModule::where('TestID','=',$this->TestIDs)
        ->get()
        ->first();  
        #INITIAL SUM OF TOTAL CORRECT ANSWER IS ZERO
        $SumTotalCorrectAnswer=0;
        foreach($ReportData as $reportQuestion){
            #GET DATA FROM QUESTION  BANK TO CHECK THE SELECTED ANSWER
            
            $QuestionBank=questionbank::where('TestID','=',$this->TestIDs)
            ->where('QuestionID','=',$reportQuestion->QuestionID)
            ->get()
            ->first();
            
            #INITAL ANSWER IS 0 MEANS WRONG
            
            $Answer=0;
            
            #IF ANSWER SELECTED IS EQUAL TO THE CORRECT ANSWER VALUE OF ANSWER IS EQUAL TO 1
            if($reportQuestion->selectedAnswer==$QuestionBank->correctAnswer){
                $Answer=1;
            }
            
            #IF ANSWER IS CORRECT THEN INCREMENT THE SUM OF CORRECT ANSWER
            // $SumTotalCorrectAnswer= $SumTotalCorrectAnswer+$Answer;
            #Hide above because no use to sum all answer because all user data is this
            $USERDATA=loginuser::where('UserID','=',$reportQuestion->UserID)->get()
            ->first();
            #DECLARE VALRIABLE 
            $selectedOptionAnswer="-1";
            #GET SELECTED ANSWER VALUE (OPTION FROM A, B,C,D)
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
            $QuestionNumber=Questionnumber::where('QuestionID','=',$reportQuestion->QuestionID)->get()
            ->first();
//Backup Old Data REeport
//   $QuestionListData[]=[
//                 "Test Mode"=>$reportQuestion->TestType,
//                 "QuestionID"=>$reportQuestion->QuestionID,
//                 "SelectedAnswer"=>$reportQuestion->selectedAnswer,
//                 "CorrectAnswer"=>$QuestionBank->correctAnswer,
//                 "Question"=>$QuestionBank->question,
//                 "SelectedOptionAnswer"=>$selectedOptionAnswer,
//                 "AnswerCorrect"=> $Answer==1?'1':'0',
//                 'TestName' => $TestName->testName,
//                 'TestDescription'=>$TestName->testDescription,
//                 'UserID'=>$reportQuestion->UserID,
//                 'Name'=>$USERDATA->name,
//                 'Email'=>$USERDATA->email,
//                 'TimeDate'=>$reportQuestion->created_at
//                     ];
            $QuestionListData[]=[
                "Test Mode"=>$reportQuestion->TestType,
                "QuestionID"=>$reportQuestion->QuestionID,
                "QuestionNumber"=>$QuestionNumber->QNo,
                // "SelectedAnswer"=>$reportQuestion->selectedAnswer,
                // "CorrectAnswer"=>$QuestionBank->correctAnswer,
                // "Question"=>$QuestionBank->question,
                // "SelectedOptionAnswer"=>$selectedOptionAnswer,
                "AnswerCorrect"=> $Answer==1?'1':'0',
                'TestName' => $TestName->testName,
                // 'TestDescription'=>$TestName->testDescription,
                'UserID'=>$reportQuestion->UserID,
                'Name'=>$USERDATA->name,
                'Email'=>$USERDATA->email,
                'TimeDate'=>$reportQuestion->created_at
                    ];
        }   
   

    }
    return collect($QuestionListData);
    }
    public function headings() :array
    {
        return ["Test Mode",
        "QID",
        "QNO",
        // "Selected Answer",
        // "Correct Answer",
        // "Question",
        // "Selected Option Answer",
        "Is Answer Correct(1=yes)",
        "Test Name",
        // "Test Description",
        "User ID",
        "Name",
        "Email",
        "TimeDate"
    ];
    }    
}
