<?php

namespace App\Http\Controllers;

use App\Models\Demogra;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Testseq;
class DemograController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'age' => 'required',
            'gender' => 'required',
            'college' => 'required',
            'state' => 'required',
            'yearStudy' => 'required',
            'inforRef'=>'required',
            'infoRefExplanation'=>'required',
            'OnlineEducation'=>'required',
            'motherOccupation'=>'required',
            'fatherOccupation'=>'required',
            'percentScore'=>'required',
            'FOccupation'=>'required',
            'MOccupation'=>'required',
            'marital'=>'required',
            'Religion'=>'required',
            'otherreligion'=>'required',
            'Areaofinterest'=>'required',
            'teaching_method_prefer'=>'required'

        ]);
        try {
    
    $database_agent2= Demogra::where('UserID','=',session()->get('userid'))->get()->first();
    if($database_agent2){
        return redirect()->back()->with('Error', 'Error : Already Present !');
    }
    $database_agent= new Demogra;
    $database_agent->age=$request->age;
    $database_agent->gender=$request->gender;
    $database_agent->college=$request->college;
    $database_agent->state=$request->state;
    $database_agent->yearStudy=$request->yearStudy;
    $database_agent->percentScoreP=$request->percentScore;
    $database_agent->FatherOccupation=$request->fatherOccupation;
    $database_agent->MotherOccupation=$request->motherOccupation;
    $database_agent->FoA=$request->FOccupation;
    $database_agent->MoA=$request->MOccupation;
    $database_agent->OnlineEducation=$request->OnlineEducation;
    $database_agent->alreadyInformation=$request->inforRef;
    $database_agent->alreadyIExplanation=$request->infoRefExplanation;

    //new added for obstrical emergencies
    $database_agent->maritalstatus=$request->marital;
    $database_agent->religion=$request->Religion;
    $database_agent->otherReligion=$request->otherreligion;
    $database_agent->areaofinterest=$request->Areaofinterest;
    $database_agent->teaching_method_prefer=$request->teaching_method_prefer;
    $database_agent->UserID=session()->get('userid');

    $res=$database_agent->save();
        if($res==1){
            $Testseq1=Testseq::where('Sequence','=','1')
            ->get()
            ->first();
    $obj=new AttempttestController();  //object to handle function
    $obj->TestLocked($Testseq1->TestID,'1','1'); //update
    }
    
    //after saving demographic data open Pre Course
    //
    
        } catch (QueryException $e) {    
            print($e);
   // return redirect()->back()->with('Error', 'Error : Try Again !');
    }
// open module
    //return redirect('/User/list-Test')->with('message', 'Start Test Now');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demogra  $demogra
     * @return \Illuminate\Http\Response
     */
    public function show(Demogra $demogra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demogra  $demogra
     * @return \Illuminate\Http\Response
     */
    public function edit(Demogra $demogra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demogra  $demogra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demogra $demogra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demogra  $demogra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demogra $demogra)
    {
        //
    }
}