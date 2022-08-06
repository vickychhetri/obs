@extends('User.userarea.layout')
@section('title','Dashboard')

@section("metaContainer")
<style>
.divList {
    background-color: #00a2ff;
    color: white;
    padding: 16px;
    margin: 10px;
}

.divList:hover {
    background-color: #bfd900;
}

.divListPost:hover {
    background-color: #edbb05;
}

.divListPost {
    background-color: #00e099;
    color: white;
    padding: 16px;
    margin: 10px;
}
</style>

@endsection

@section("container")

<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Test Reports</h2>
<!--// main-heading -->

<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3">
        <p class="paragraph-agileits-w3layouts">
        <h2> Pre-Test Report</h2>
        <?php
                    $testcounter=1;
                    ?>
        <ul>
            @foreach($Tests as $test)
            <a href="/User/Test/reportAfterTest/{{$test->TestID}}/PRE">
                <li>
                    <div class="divList">

                        {{$testcounter++}}).
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-file-bar-graph" viewBox="0 0 16 16">
                            <path
                                d="M4.5 12a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1zm3 0a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm3 0a.5.5 0 0 1-.5-.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1z" />
                            <path
                                d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                        </svg>
                        {{$test->testName}}

                    </div>
                </li>
            </a>
            @endforeach
        </ul>
        <br /><br />
        <h2> Post-Test Report</h2>
        <?php
                    $testcounter=1;
                    ?>
        <ul>
            @foreach($Tests as $test)
            <?php 
            if($test->TestID!=1){
            ?>
            <a href="/User/Test/reportAfterTest/{{$test->TestID}}/POST">
                <li>
                    <div class="divListPost">
                        {{$testcounter++}}).
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-file-bar-graph" viewBox="0 0 16 16">
                            <path
                                d="M4.5 12a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1zm3 0a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm3 0a.5.5 0 0 1-.5-.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1z" />
                            <path
                                d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                        </svg>
                        {{$test->testName}}

                    </div>
                </li>
            </a>
            <?php
              }
            ?>
            @endforeach
            <a href="/User/Test/report/myFeedback">
                <li>
                    <div class="divListPost">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-file-bar-graph" viewBox="0 0 16 16">
                            <path
                                d="M4.5 12a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1zm3 0a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm3 0a.5.5 0 0 1-.5-.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1z" />
                            <path
                                d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                        </svg>
                        3.) UTILITY/ LEARNER SATISFACTION OPINIONNAIRE

                    </div>
                </li>
            </a>
        </ul>
        <br /> <br />
        <span style="float: right;"> Amita </span>
        </p>
    </div>
    <!--// Error Page Info -->

</div>
@endsection