<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\loginuser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Lockunlockvideo;
use Carbon\Carbon;  
use App\Models\Videocomplete;
use App\Models\Maincoursestep;

class LoginuserController extends Controller
{
    
        public function seen_all_videos($UserID){
            // echo $UserID;
              for($i=1;$i<=6;$i++) {
             $datadump=Lockunlockvideo::where('ContentType','=',"1")
            ->where('VideoID','=',$i)
            ->where('UserID','=',$UserID)
            ->get()
            ->first();

            if(!isset($datadump)){
                // $videoCodeSe=2;
                $obAgent= new Lockunlockvideo;
                $obAgent->ContentType="1";
                $obAgent->VideoID=$i;
                $obAgent->unLock="1";
                $obAgent->UserID=$UserID;
                $obAgent->save();
            }
            else {
                           $datadump->unLock="1";
                           $datadump->save();
                        //    $videoCodeSe=3;
            }
              }
        $complete='1';
        for($i=1;$i<=6;$i++) {
        $completeStatus=Videocomplete::where('VideoID','=',$i)
        ->where('UserID','=',$UserID)
        ->get()
        ->first();

        if(isset($completeStatus)){
            $completeStatus->Complete=$complete;
            $completeStatus->save();
        }else {
            $obkAgent= new Videocomplete;
            $obkAgent->VideoID=$i;
            $obkAgent->UserID=$UserID;
            $obkAgent->Complete='1';
            $obkAgent->save();
             }
        }
        
        $ChapterID=env("CHAPTERIDCODE");
          $mainCourseStepVideo= Maincoursestep::where('UserID','=',$UserID)
            ->where('ChapterID','=',$ChapterID)
            ->where('Step','=',"3")
            ->get()
            ->first();
            if(isset($mainCourseStepVideo)){
             $mainCourseStepVideo->Complete="1";
            $mainCourseStepVideo->save();
            }else{  
                $agentUpdatingStep=new Maincoursestep;
                $agentUpdatingStep->Step="3";
                $agentUpdatingStep->Complete="1";
                $agentUpdatingStep->ChapterID=$ChapterID;
                $agentUpdatingStep->UserID=$UserID;
                $agentUpdatingStep->save();
            }
         return redirect()->back()->with('message',"All Videos Auto completed successfully !");
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('User.register');
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
    public function enableUser($UserID){
        $agent=loginuser::where('UserID','=',$UserID)->get()->first();
        if(isset($agent)){
            $agent->approved="1";
            $agent->save();
            return redirect()->back()->with('message',"User Enable");
        }
        return redirect()->back()->with('Error',"Failed !");
    }

    public function disableUser($UserID){
      $agent=loginuser::where('UserID','=',$UserID)->get()->first();
        if(isset($agent)){
            $agent->approved="0";
            $agent->save();
            return redirect()->back()->with('message',"User Disable");
        }
        return redirect()->back()->with('Error',"Failed !");
    }
    public function login_check(Request $request)
    {
        
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        try {
    
            $database_agent2= loginuser::where('email','=',$request->email)
            ->where('password','=',$request->password)            
            ->where('approved','=','1')  
            ->get()
            ->first();
            //save the content in session and open dashboard
            if($database_agent2){
           
                Session()->put('userid',$database_agent2->UserID);
                Session()->put('username',$database_agent2->email);
                Session()->put('fullname',$database_agent2->name);
                Session()->put('mobile',$database_agent2->mobile);
                Session()->put('photo',$database_agent2->profilePhoto);
                Session()->put('approved',$database_agent2->approved);
                Session()->put('created_at',$database_agent2->created_at);

                return redirect('/UDashboard')->with('message', 'Welcome');
                  
            }else {
                return redirect()->back()->with('Error', 'Error : Invalid Login !');
            }
           
                } catch (QueryException $e) {    
                    print($e);
            return redirect()->back()->with('Error', 'Error : Invalid Login !');
            }
        
    }

    public function show_Users_register(){
        $data=loginuser::all();
        return view('Admin.listUsers')
        ->with('Users',$data);
    }
    public function show_Users_register_report(){
        $data=loginuser::where('approved','=','1')->get();
        return view('Admin.listUsersTwo')
        ->with('Users',$data);
    }
    
    

    
    public function show_Users_register_report_single($UserID){
        $PostTest= new AjaxController();
        $data=loginuser::where('approved','=','1')->where('UserID','=',$UserID)->get()->first();
        $Status=$PostTest->VideoCOmpleted($UserID);
        $OpenButton="1";

        $res_Agent_check = DB::table('postactivateds')
        ->where('UserID', '=', $UserID)
        ->get()
        ->first();
        
        $ButtonData=null;
        if($res_Agent_check){
        $ButtonData=$res_Agent_check;
        }else {
        $ButtonData=null;
        }

        if($Status=="1"){
            $OpenButton="1";
        }else {
            $OpenButton="0";
        }
        return view('Admin.listUsersTwoSingle')
        ->with('UserIdetification',$data)
        ->with('OpenButton',$OpenButton)
        ->with('PressButon',$ButtonData);
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
            'fullName' => 'required|min:3|max:50',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'termCondition'=>'required'
        ]);
        try {
    
    $database_agent2= loginuser::where('email','=',$request->email)->get()->first();
    if($database_agent2){
        return redirect()->back()->with('Error', 'Error : Email Already registered !');
    }
    $database_agent= new loginuser;
    $database_agent->name=$request->fullName;
    $database_agent->email=$request->email;
    $database_agent->mobile=$request->mobile;
    $database_agent->password=$request->password;
    $database_agent->save();
    
        } catch (QueryException $e) {    
            print($e);
    return redirect()->back()->with('Error', 'Error : Try Again !');
    }

    return redirect('/Login')->with('message', 'Registration Successfully Done ! , login Now.');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\loginuser  $loginuser
     * @return \Illuminate\Http\Response
     */
    public function show(loginuser $loginuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loginuser  $loginuser
     * @return \Illuminate\Http\Response
     */
    public function edit(loginuser $loginuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loginuser  $loginuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loginuser $loginuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loginuser  $loginuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(loginuser $loginuser)
    {
        //
    }
}