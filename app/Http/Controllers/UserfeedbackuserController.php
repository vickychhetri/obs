<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Userfeedbackuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Userfeedcomplete;

class UserfeedbackuserController extends Controller
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

    public function UserFeedbackData()
    {
        $UserID=session()->get('userid');
        $res = DB::table('userfeedbacks')
        ->join('userfeedbackusers', 'userfeedbacks.ItemID', '=', 'userfeedbackusers.ItemID')
        ->select('userfeedbacks.*','userfeedbackusers.*')
        ->where('userfeedbackusers.UserID', '=', $UserID)
        ->get();

      return view('User.userarea.feedbackuserReport')
      ->with('FEEDBACK',$res);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questionData=session()->get('FeedData');
        $UserID=session()->get('userid');
        $dateSubmit = Carbon::now();
        $i=1;
                foreach($questionData as $questionD){
                $data[] = [
                            'ItemID' =>$questionD->ItemID,
                            'Answer' => $request["optionSelected".$i],
                            'UserID' =>$UserID,
                            'created_at'=>$dateSubmit,
                            'updated_at'=>$dateSubmit
                        ];
            $i++;
              }
           
              Userfeedbackuser::insert($data);
              $agent=new Userfeedcomplete;
              $agent->Type="1";
              $agent->Complete="1";
              $agent->UserID=$UserID;
              $agent->save();
              return redirect('thank-you');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userfeedbackuser  $userfeedbackuser
     * @return \Illuminate\Http\Response
     */
    public function show(Userfeedbackuser $userfeedbackuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userfeedbackuser  $userfeedbackuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Userfeedbackuser $userfeedbackuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userfeedbackuser  $userfeedbackuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userfeedbackuser $userfeedbackuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userfeedbackuser  $userfeedbackuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userfeedbackuser $userfeedbackuser)
    {
        //
    }
}
