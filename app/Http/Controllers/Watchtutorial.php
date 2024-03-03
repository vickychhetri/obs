<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\videoModule;
use App\Models\Videocomplete;
use App\Models\Videoseq;
use App\Models\Lockunlockvideo;
use Illuminate\Support\Facades\Cache;

class Watchtutorial extends Controller
{
    public function FirstSequenceVideo(){
        $Video=Videoseq::where('Sequence','=','1')->get()->first();
        return $Video->VideoID;
    }

    public function VideoToSequenceNo($VideoIDs){
        $Video=Videoseq::where('VideoID','=',$VideoIDs)->get()->first();
        return $Video->Sequence;
    }
    public function SequenceNoToVideo($no){
        $Video=Videoseq::where('Sequence','=',$no)->get()->first();
        return $Video->VideoID;
    }
    public function MaxmiumVideos(){
        $Video=Videoseq::all();
        return $Video->count();
    }
    public function NextVideoToPlay($VideoIDs){
        $obj= new Watchtutorial;
        $currentSquence=$obj->VideoToSequenceNo($VideoIDs);
        $currentSquence+=1;
        $Video=Videoseq::where('Sequence','=',$currentSquence)->get()->first();
        if(isset($Video)){
            return $Video->VideoID;
        }
       return 0;
    }

    public function UnlockVideo($Type,$VideoIDs,$UserID){
        $obj= new Watchtutorial;
        if(isset($VideoIDs)){
        $unLockStatus=$obj->IsVideoUnLocked($Type,$VideoIDs,$UserID);

        if($unLockStatus==null){
               $obAgent= new Lockunlockvideo;
               $obAgent->ContentType=$Type;
               $obAgent->VideoID=$VideoIDs;
               $obAgent->unLock="1";
               $obAgent->UserID=$UserID;
               $obAgent->save();
            return true;
            }
        else if($unLockStatus=="1"){
           return true;
        }else {
            // edit
            $obAgent=Lockunlockvideo::where('ContentType','=',$Type)
            ->where('VideoID','=',$VideoIDs)
            ->where('UserID','=',$UserID)
            ->get()
            ->first();
               $obAgent->unLock="1";
               $obAgent->save();
               return true;
        }
    }
        return false;
    }


    public function UnlockNextVideo($Type,$VideoIDs,$UserID){
        $obj= new Watchtutorial;
        $currentSquence=$obj->VideoToSequenceNo($VideoIDs);
        $currentSquence+=1;
        $Video=Videoseq::where('Sequence','=',$currentSquence)->get()->first();
        if(isset($Video)){
        $VideoIDNExt=$Video->VideoID;
        $unLockStatus=$obj->IsVideoUnLocked($Type,$VideoIDNExt,$UserID);

        if($unLockStatus==null){
               $obAgent= new Lockunlockvideo;
               $obAgent->ContentType=$Type;
               $obAgent->VideoID=$VideoIDNExt;
               $obAgent->unLock="1";
               $obAgent->UserID=$UserID;
               $obAgent->save();
            return true;
            }
        else if($unLockStatus=="1"){
           return true;
        }else {
            // edit
            $obAgent=Lockunlockvideo::where('ContentType','=',$Type)
            ->where('VideoID','=',$VideoIDNExt)
            ->where('UserID','=',$UserID)
            ->get()
            ->first();
               $obAgent->unLock="1";
               $obAgent->save();
               return true;
        }
    }
        return false;
    }

    public function IsVideoUnLocked($Type,$VideoIDs,$UserID){
        $LockStatus=Lockunlockvideo::where('ContentType','=',$Type)
        ->where('VideoID','=',$VideoIDs)
        ->where('UserID','=',$UserID)
        ->get()
        ->first();
        if(isset($LockStatus)){
            return $LockStatus->unLock;
        }
       return null;
    }
    public function IsVideoComplete($VideoIDs,$UserID){

        $VideoStatus=Videocomplete::where('VideoID','=',$VideoIDs)
        ->where('UserID','=',$UserID)
        ->get()
        ->first();
        if(isset($VideoStatus))
        return $VideoStatus->Complete;
        else
        return null;
    }

    // public function index($VideoIDs){

    // }

    public function WhatIsMyVideoToWatch($UserID){
        $obj= new Watchtutorial;

        $WatchStatus=Videocomplete::where('UserID','=',$UserID)
        ->where('Complete','=','1')->get();

        $oldervideo=$obj->FirstSequenceVideo();
        $data[0]=$oldervideo;
        $data[1]=$oldervideo;

        if($WatchStatus->count()>0){
            $MAX=$obj->MaxmiumVideos();

            for($i=1;$i<=$MAX;$i++){
                $Video=$obj->SequenceNoToVideo($i);

                $data[0]=$oldervideo;
                $data[1]=$Video;

                $VideoStatus=Videocomplete::where('UserID','=',$UserID)
                ->where('Complete','=','1')->where('VideoID','=',$Video)->get();

                if(isset($VideoStatus)){
                    if($VideoStatus->count()<1){
                        return $data;
                    }

                }
                $oldervideo= $Video;
            }
                return $data;

        }else {
            // $VideoIDs=$obj->FirstSequenceVideo();
            // $data[0]=$VideoIDs;
            // $data[1]=$$VideoIDs;
            return $data;
        }

    }

    public function StartVideoCourse(){
        $UserID=session()->get('userid');
        $obj=new Watchtutorial;
        $VideoIDData=$obj->WhatIsMyVideoToWatch($UserID); // find first or active

        if(isset($VideoIDData)){
            if(isset($VideoIDData[1])){
                $VideoIDs=$VideoIDData[1];
            }else{
                   $VideoIDs=$VideoIDData[0];
            }

        }else {
            $VideoIDs=$VideoIDData[0];
        }

        if($VideoIDs>3){
            $VideoIDs=3;
        }
        // $obj->index($VideoIDs); // play

        // $UserID=session()->get('userid');
        // $obj=new Watchtutorial;
        if($VideoIDs!=null){
            if($obj->IsVideoUnLocked('1',$VideoIDs,$UserID)=="1"){
                $SeekPointVideo = Cache::get($VideoIDs."@".$UserID,'0');
                $VIDEOALL=videoModule::where('VideoID','<=',3)->get();
                $a=$obj->findLockUnlockArray($VIDEOALL);
                $VIDEO=videoModule::where('VideoID','=',$VideoIDs)->get()->first();
                return view('User.userarea.tutorial')
                ->with('VideoModule',$VIDEO)
                ->with('AllVideoModule',$VIDEOALL)
                ->with('UnLock',$a)
                ->with('SeekVideo',$SeekPointVideo);
            }
        }
        return redirect('/User/Tutorial/CourseEND');
    }
public function findLockUnlockArray($VIDEOALL){
    $UserID=session()->get('userid');
    $a=null;
    foreach($VIDEOALL as $dt){
        $unlockValue=Lockunlockvideo::where('ContentType','=','1')
        ->where('unLock','=','1')
        ->where('VideoID','=',$dt->VideoID)
        ->where('UserID','=',$UserID)
        ->get()
        ->first();
        if($unlockValue){
            $a[$dt->VideoID] = $unlockValue->unLock;
        }else {
            $a[$dt->VideoID] = 0;
        }
    }
return $a;
}

    public function LaunchVideo($VideoIDs){
        $UserID=session()->get('userid');
        $obj=new Watchtutorial;
    // print_r($VideoIDs);
        if($VideoIDs!=null){
            if($obj->IsVideoUnLocked('1',$VideoIDs,$UserID)=="1"){
                $SeekPointVideo = Cache::get($VideoIDs."@".$UserID,'0');
                $VIDEOALL=videoModule::where('VideoID','<=',3)->get();
                $a=$obj->findLockUnlockArray($VIDEOALL);
                $VIDEO=videoModule::where('VideoID','=',$VideoIDs)->get()->first();
                return view('User.userarea.tutorial')
                ->with('VideoModule',$VIDEO)
                ->with('AllVideoModule',$VIDEOALL)
                ->with('UnLock',$a)
                ->with('SeekVideo',$SeekPointVideo);
            }else{
                return redirect('/User/Tutorial/CourseLocked');
            }
        }
        return redirect('/User/Tutorial/CourseLocked');
    }


public function LaunchVideoPrevious($VideoIDs){
        $obj= new Watchtutorial;
        $currentSquence=$obj->VideoToSequenceNo($VideoIDs);
        if($currentSquence>1)
            $currentSquence=$currentSquence-1;
            else
            $currentSquence=1;
     $Video=Videoseq::where('Sequence','=',$currentSquence)->get()->first();
     return redirect('/User/Tutorials/Watch/'.$Video->VideoID);
    }
public function LaunchVideoNext($VideoIDs){
    $obj= new Watchtutorial;
    $MAX=$obj->MaxmiumVideos();

    $currentSquence=$obj->VideoToSequenceNo($VideoIDs);
    if($currentSquence<$MAX){
        $currentSquence=$currentSquence+1;
    }
    else{
        return redirect('/User/Start-Course');
    }
    // $currentSquence=$MAX;

    $Video=Videoseq::where('Sequence','=',$currentSquence)->get()->first();
         return redirect('/User/Tutorials/Watch/'.$Video->VideoID);

}



}
