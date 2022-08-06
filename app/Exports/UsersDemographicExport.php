<?php

namespace App\Exports;

use App\Models\Demogra;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersDemographicExport implements FromCollection, WithHeadings
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
                // return Demogra::where('UserID','=',$this->id)->get();
        return Demogra::all();
    }
    public function headings() :array
    {
        return [ "id","age","gender","college","state","yearStudy","percentScoreP",
        "FatherOccupation","MotherOccupation","FoA","MoA","OnlineEducation",
        "alreadyInformation","alreadyIExplanation","UserID","created_at","updated_at"];
    }
    

}