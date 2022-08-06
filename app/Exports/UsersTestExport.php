<?php

namespace App\Exports;

use App\Models\attempttest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class UsersTestExport implements FromCollection, WithHeadings
{
    protected $id;
    protected $testMode;


    function __construct($id,$testMode) {
        $this->id = $id;
        $this->testMode = $testMode;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    
        $res = DB::table('questionbanks')
        ->join('attempttests', 'questionbanks.QuestionID', '=', 'attempttests.QuestionID')
        ->select('attempttests.TestType','questionbanks.QuestionID','attempttests.TestID','questionbanks.question','questionbanks.optionA',
        'questionbanks.optionB','questionbanks.optionC','questionbanks.optionD',
        'questionbanks.correctAnswer',
        'attempttests.selectedAnswer','attempttests.UserID','attempttests.created_at')
        ->where('attempttests.UserID', '=', $this->id)
        ->where('attempttests.TestType', '=', $this->testMode)
        ->get();
        return $res;


    }
    public function headings() :array
    {
        return ["Test Mode", "QID","TestID","Question","Option A","Option B","Option C","Option D","Correct Answer",
        "selectedAnswer","UserID","created_at"];
    }
     
}
