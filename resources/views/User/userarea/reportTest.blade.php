@extends('User.userarea.layout')
@section('title','Dashboard')


@section("metaContainer")
<style>
/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

.progress {
    width: 150px;
    height: 150px;
    background: none;
    position: relative;
}

.progress::after {
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 6px solid #eee;
    position: absolute;
    top: 0;
    left: 0;
}

.progress>span {
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}

.progress .progress-left {
    left: 0;
}

.progress .progress-bar {
    width: 100%;
    height: 100%;
    background: none;
    border-width: 6px;
    border-style: solid;
    position: absolute;
    top: 0;
}

.progress .progress-left .progress-bar {
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left;
}

.progress .progress-right {
    right: 0;
}

.progress .progress-right .progress-bar {
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transform-origin: center right;
}

.progress .progress-value {
    position: absolute;
    top: 0;
    left: 0;
}



body {
    /* background: #ff7e5f; */
    /* background: -webkit-linear-gradient(to right, #ff7e5f, #feb47b); */
    /* background: linear-gradient(to right, #ff7e5f, #feb47b); */
    min-height: 100vh;
}

.rounded-lg {
    border-radius: 1rem;
}

.text-gray {
    color: #aaa;
}

div.h4 {
    line-height: 1rem;
}
</style>

@endsection

@section("container")

<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Report</h2>
<!--// main-heading -->

<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3">
        <p class="paragraph-agileits-w3layouts">

        <h2> <b style="font-weight: bold;"> Report Test Name: </b> {{$TestReportDataset['TestName']}} </h2>
        <hr />
        <h2> <b> Test Description: </b>{{$TestReportDataset['TestDescription']}}</h2>
        <hr />
        <h2> <b> Total Question: </b> {{$TestReportDataset['TotalQuestion']}}</h2>
        <hr />
        <h2> <b> Total Correct: </b> {{$TestReportDataset['TotalCorrect']}}</h2>
        <hr />
        <h2> <b> Total Wrong: </b> {{$TestReportDataset['TotalQuestion']-$TestReportDataset['TotalCorrect']}}</h2>
        <br /><br />
        <center> <a href="/User/Start-Course" class="btn btn-success"> GO TO NEXT</a> </center>
        <br /> <br />
        
        </p>


        <div class="col-xl-12 col-lg-12 mb-12">
            <div class="bg-white rounded-lg p-5 shadow">
                <h2 class="h6 font-weight-bold text-center mb-4">Test Report in Percentage(%)</h2>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Progress bar 1 -->
                        <div class="progress mx-auto"
                            data-value="{{(($TestReportDataset['TotalQuestion']-$TestReportDataset['TotalCorrect'])/$TestReportDataset['TotalQuestion'])*100}}"
                            ]>
                            <span class="progress-left">
                                <span class="progress-bar border-danger"></span>
                            </span>
                            <span class="progress-right">
                                <span class="progress-bar border-danger"></span>
                            </span>
                            <div
                                class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h2 font-weight-bold">
                                    {{number_format((($TestReportDataset['TotalQuestion']-$TestReportDataset['TotalCorrect'])/$TestReportDataset['TotalQuestion'])*100,2, '.', '')}}<sup
                                        class="small">%</sup></div>
                            </div>
                        </div>
                        <!-- END -->
                        <center> Incorrect %</center>

                    </div>
                    <div class="col-md-6">

                        <!-- Progress bar 1 -->
                        <div class="progress mx-auto"
                            data-value="{{(($TestReportDataset['TotalCorrect'])/$TestReportDataset['TotalQuestion'])*100}}"
                            ]>
                            <span class="progress-left">
                                <span class="progress-bar border-success"></span>
                            </span>
                            <span class="progress-right">
                                <span class="progress-bar border-success"></span>
                            </span>
                            <div
                                class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h2 font-weight-bold">
                                    {{number_format((($TestReportDataset['TotalCorrect'])/$TestReportDataset['TotalQuestion'])*100,2, '.', '')}}<sup
                                        class="small">%</sup></div>
                            </div>
                        </div>
                        <!-- END -->
                        <center> Correct %</center>

                    </div>
                </div>




            </div>
        </div>

@foreach($TestReportDataset["QuestionTestReport"] as $singleQuestion) 
{{ $singleQuestion["Question"]}}  : {{ $singleQuestion["SelectedOptionAnswer"]}} {{ $singleQuestion["AnswerCorrect"]}}  <br/>  <br/> <br/>
@endforeach


    </div>

</div>
</div>
<!--// Error Page Info -->

</div>
@endsection

@section("footerContainer")
<script>
$(function() {

    $(".progress").each(function() {

        var value = $(this).attr('data-value');
        var left = $(this).find('.progress-left .progress-bar');
        var right = $(this).find('.progress-right .progress-bar');

        if (value > 0) {
            if (value <= 50) {
                right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
            } else {
                right.css('transform', 'rotate(180deg)')
                left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
            }
        }

    })

    function percentageToDegrees(percentage) {

        return percentage / 100 * 360

    }

});
</script>

@endsection