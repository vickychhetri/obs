@extends('User.userarea.layout')
@section('title','Start Test')

@section("container")


<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3">
        <p class="paragraph-agileits-w3layouts">
            <!-- main-heading -->

        <h2 class="main-title-w3layouts mb-2 text-center">Test</h2>
        <h3 class="main-title-w3layouts mb-2 ">Test Name: {{$test[0]->testName}}</h3>
        <p>Detail: {{$test[0]->testDescription}} </p>
        <p>No. of Question: {{$noQ}} </p>
        <p>Mode: {{$TestType}} </p>
        <center> 
            <a href="/User/Test/{{$test[0]->TestID}}" class="btn btn-success"> Start</a>
        </center>
            <!--// main-heading -->
        </p>
    </div>
    <!--// Error Page Info -->

</div>
@endsection