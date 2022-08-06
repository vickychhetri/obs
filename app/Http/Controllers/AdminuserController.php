<?php

namespace App\Http\Controllers;

use App\Models\adminuser;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\QueryException;


class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.AdminLogin');
    }
    public function openDashboard()
    {
        return view('Admin.dashboard');
    }
    public function checkAdminlogin(Request $request){
        
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        try {
    
            $database_agent2= adminuser::where('email','=',$request->email)
            ->where('passcode','=',$request->password)            
            ->get()
            ->first();
            //save the content in session and open dashboard
            if($database_agent2){
           
                Session()->put('adminid',$database_agent2->AdminID);
                Session()->put('username',$database_agent2->userName);
                Session()->put('email',$database_agent2->email);
                Session()->put('approved',$database_agent2->approved);
                Session()->put('created_at',$database_agent2->created_at);
                Session()->put('PermissionAdmin',"1");
                return redirect('/Dashboard')->with('message', 'Welcome');
                  
            }else {
                return redirect()->back()->with('Error', 'Error : Invalid Login !');
            }
           
                } catch (QueryException $e) {    
                    print($e);
            return redirect()->back()->with('Error', 'Error : Invalid Login !');
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
     * @param  \App\Models\adminuser  $adminuser
     * @return \Illuminate\Http\Response
     */
    public function show(adminuser $adminuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adminuser  $adminuser
     * @return \Illuminate\Http\Response
     */
    public function edit(adminuser $adminuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\adminuser  $adminuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adminuser $adminuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adminuser  $adminuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(adminuser $adminuser)
    {
        //
    }
}
