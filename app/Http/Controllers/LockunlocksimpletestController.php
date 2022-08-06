<?php

namespace App\Http\Controllers;

use App\Models\Lockunlocksimpletest;
use Illuminate\Http\Request;

class LockunlocksimpletestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function IsLocked($TYPE,$UserID)
    {
        $LockStatus=Lockunlocksimpletest::where('UserID','=',$UserID)
        ->where('TYPE','=',$TYPE)
        ->get()
        ->first();
        if(isset($LockStatus)){
            if($LockStatus->UnLock=="1"){
                return false;
            }
            return true;
        }
       return true; 
    }
    public function IsComplete($TYPE,$UserID)
    {
        $LockStatus=Lockunlocksimpletest::where('UserID','=',$UserID)
        ->where('TYPE','=',$TYPE)
        ->get()
        ->first();
        if(isset($LockStatus)){
            if($LockStatus=="2"){
                return true;
            }
            return false;
        }
       return false; 
    }
    public function changeStatus($TYPE,$lock,$UserID)
    {
       
            $LockStatus=Lockunlocksimpletest::where('UserID','=',$UserID)
            ->where('TYPE','=',$TYPE)
            ->get()
            ->first();

            if(isset($LockStatus)){
                $LockStatus->UnLock=$lock;
                $LockStatus->save();
                return true;
            }else {
                $LockStatus2= new Lockunlocksimpletest;
                $LockStatus2->TYPE=$TYPE;
                $LockStatus2->UnLock=$lock;
                $LockStatus2->UserID=$UserID;
                $LockStatus2->save();
                return true;
            }
            
        return false;
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
     * @param  \App\Models\Lockunlocksimpletest  $lockunlocksimpletest
     * @return \Illuminate\Http\Response
     */
    public function show(Lockunlocksimpletest $lockunlocksimpletest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lockunlocksimpletest  $lockunlocksimpletest
     * @return \Illuminate\Http\Response
     */
    public function edit(Lockunlocksimpletest $lockunlocksimpletest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lockunlocksimpletest  $lockunlocksimpletest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lockunlocksimpletest $lockunlocksimpletest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lockunlocksimpletest  $lockunlocksimpletest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lockunlocksimpletest $lockunlocksimpletest)
    {
        //
    }
}
