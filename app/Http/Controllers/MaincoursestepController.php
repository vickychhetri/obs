<?php

namespace App\Http\Controllers;

use App\Models\Maincoursestep;
use Illuminate\Http\Request;

class MaincoursestepController extends Controller
{
    public function AllStepCompleted()
    {
        $UserID=session()->get('userid');
        
        $step1=Maincoursestep::where('Step','=','1')->where('Complete','=','1')->where('UserID','=',$UserID)->get()->first();
        $step2=Maincoursestep::where('Step','=','2')->where('Complete','=','1')->where('UserID','=',$UserID)->get()->first();
        $step3=Maincoursestep::where('Step','=','3')->where('Complete','=','1')->where('UserID','=',$UserID)->get()->first();
        $TestMode="1";
        if(isset($step1)){
            $TestMode="2";
            if(isset($step2)){
                $TestMode="3";
                if(isset($step3)){
                     return true;
                }
            }   

        }
         
        return false;
    }

    

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maincoursestep  $maincoursestep
     * @return \Illuminate\Http\Response
     */
    public function show(Maincoursestep $maincoursestep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maincoursestep  $maincoursestep
     * @return \Illuminate\Http\Response
     */
    public function edit(Maincoursestep $maincoursestep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maincoursestep  $maincoursestep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maincoursestep $maincoursestep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maincoursestep  $maincoursestep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maincoursestep $maincoursestep)
    {
        //
    }
}
