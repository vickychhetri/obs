@extends('User.userarea.layout')
@section('title','Dashboard')

@section("container")   
   
            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center">Welcome</h2>
            <!--// main-heading -->

            <!-- Error Page Content -->
            <div class="blank-page-content">

                <!-- Error Page Info -->
                <div class="outer-w3-agile mt-3">
                    <p class="paragraph-agileits-w3layouts">
                    <center> <h1> No Test Question Available : Contact Admin</h1>
                    <a href="/User/Test/InCompleteAttemptTest/{{$TestID}}" class="btn btn-info"> Next Test </a>
                    </center>

                    <br/> <br/>
                    <span style="float: right;"> Amita </span>
                    </p>
                </div>
                <!--// Error Page Info -->

            </div>
@endsection