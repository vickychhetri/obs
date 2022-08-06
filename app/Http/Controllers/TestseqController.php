<?php

namespace App\Http\Controllers;

use App\Models\Testseq;
use Illuminate\Http\Request;

class TestseqController extends Controller
{
    public function FirstTestSequence()
    {
        $data=Testseq::where('Sequence','=','1')->get()->first();
        if($data)
        return $data->TestID;
        else 
        return null;
    }
    public function SecondTestSequence()
    {
        $data=Testseq::where('Sequence','=','2')->get()->first();
        if($data)
        return $data->TestID;
        else 
        return null;
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
     * @param  \App\Models\Testseq  $testseq
     * @return \Illuminate\Http\Response
     */
    public function show(Testseq $testseq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testseq  $testseq
     * @return \Illuminate\Http\Response
     */
    public function edit(Testseq $testseq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testseq  $testseq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testseq $testseq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testseq  $testseq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testseq $testseq)
    {
        //
    }
}
