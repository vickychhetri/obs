<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Lockunlockvideo;
use App\Models\Testcomplete;
use App\Models\Userfeedcomplete;
class Coursefullstatus extends Component
{
    public $Percentage;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $UserID=session()->get('userid');
        $datasetComplete=Testcomplete::where('UserID','=',$UserID)
        ->where('TypeCategory','=',"PRE")
        ->where('Complete','=',"1")
        ->get();

        $datasetComplete2=Testcomplete::where('UserID','=',$UserID)
        ->where('TypeCategory','=',"POST")
        ->where('Complete','=',"1")
        ->get();
        
        $datasetComplete3=Lockunlockvideo::where('UserID','=',$UserID)
        ->where('ContentType','=',"1")
        ->where('unLock','=',"1")
        ->get();
        
        $datasetComplete4=Userfeedcomplete::where('UserID','=',$UserID)
        ->where('Type','=',"1")
        ->where('Complete','=',"1")
        ->get();
        
        ;
        
        if(isset($datasetComplete)){
            $varD=$datasetComplete->count();
        }else {
            $varD=0;
        }
        if(isset($datasetComplete2)){
            $varP=$datasetComplete2->count();
        }else{
            $varP=0;
        }
      
        if(isset($datasetComplete3)){
            $varV=$datasetComplete3->count();
        }else{
            $varV=0;
        }

        if(isset($datasetComplete4)){
            $varF=$datasetComplete4->count();
        }else{
            $varF=0;
        }
        $this->Percentage=(($varD+$varP+$varV+$varF)/12)*100;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.coursefullstatus');
    }
}
