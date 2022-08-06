<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use App\Models\Userfeedbackuser;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserFeedbackExport implements FromCollection, WithHeadings
{
    protected $id;

    function __construct($id) {
           $this->id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $res = DB::table('userfeedbacks')
        ->join('userfeedbackusers', 'userfeedbacks.ItemID', '=', 'userfeedbackusers.ItemID')
        ->select('userfeedbacks.item','userfeedbackusers.Answer','userfeedbackusers.UserID','userfeedbackusers.created_at')
        ->where('userfeedbackusers.UserID', '=', $this->id)
        ->get();
        return $res;
    }
    public function headings() :array
    {
        return [ "QUESTION","ANSWER","USER_ID","CREATED_AT"];
    }
}
