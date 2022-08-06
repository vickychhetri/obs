<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
// use App\Models\Userfeedbackuser;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsersFeedbackExportAll implements FromCollection, WithHeadings
{
 
    function __construct() {
     }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        #HIDE THE USER ID TO GET ALL THE DATA
        $res = DB::table('userfeedbacks')
        ->join('userfeedbackusers', 'userfeedbacks.ItemID', '=', 'userfeedbackusers.ItemID')
        ->select('userfeedbacks.ItemID','userfeedbacks.item','userfeedbackusers.Answer','userfeedbackusers.UserID','userfeedbackusers.created_at')
        ->orderBy('userfeedbackusers.UserID', 'desc')
        ->get();
       #LOOP THE DATA TO CHECK ANSWER AND VALUE THEM
        foreach($res as $feed){
            $MarksForTheAnswer=1;
            switch($feed->Answer){
                case "Strongly Agree":
                    $MarksForTheAnswer=5;
                    break;
                case "Agree":
                    $MarksForTheAnswer=4;
                    break;
                case "Agree":
                    $MarksForTheAnswer=3;
                    break;
                case "Disagree":
                    $MarksForTheAnswer=2;
                    break;
                case "Strongly disagree":
                    $MarksForTheAnswer=1;
                    break;
                default:
                $MarksForTheAnswer=1;
            }
            #MAKE ARRAY TO HOLD VALUES
            $dataFeed[]=[
                'ItemID'=>$feed->ItemID,
                'Question'=>$feed->item,
                'ANSWER'=>$feed->Answer,
                'Marks'=>$MarksForTheAnswer,
                'USER_ID'=>$feed->UserID,
                'TimeDate'=>$feed->created_at
            ];

        }
        #RETURN COLLECT DATA TO CONVERT INTO EXCEL 
        return collect($dataFeed);
    }
    public function headings() :array
    {   #HEADING TITLE
        return [ "QID","QUESTION","ANSWER","MARKVALUE","USER_ID","CREATED_AT"];
    }

}