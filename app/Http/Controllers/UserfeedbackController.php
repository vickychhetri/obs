<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MaincoursestepController;
use App\Models\Userfeedback;
use Illuminate\Http\Request;
use App\Models\Userfeedcomplete;

class UserfeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent= new MaincoursestepController;
        if($agent->AllStepCompleted()){

        $UserID=session()->get('userid');
        $UserFeedBack=Userfeedcomplete::where('UserID','=',$UserID)
        ->where('Complete','=','1')
        ->get()
        ->first();
        if($UserFeedBack){
            return redirect('thank-you');
        }  
            $data=Userfeedback::all();
            Session()->put('FeedData',$data); 
            return view('User.userarea.feedback')
            ->with('FeedQuestion',$data);
        }else {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userfeedback  $userfeedback
     * @return \Illuminate\Http\Response
     */
    public function show(Userfeedback $userfeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userfeedback  $userfeedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Userfeedback $userfeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userfeedback  $userfeedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userfeedback $userfeedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userfeedback  $userfeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userfeedback $userfeedback)
    {
        //
    }
}
