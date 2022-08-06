@extends('User.userarea.layout')
@section('title','Dashboard')
@section("metaContainer")
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
    box-sizing: border-box;
}

body {
    background-color: #f1f1f1;
}

#regForm {
    background-color: #ffffff;
    margin: 50px auto;
    font-family: Raleway;
    padding: 10px;
    width: 100%;
    min-width: 300px;
}

h1 {
    text-align: center;
}

/* 
input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
} */

/* Mark input boxes that gets an error on validation: */
input.invalid {
    background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
    display: none;
}

button {
    background-color: #04AA6D;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
}

button:hover {
    opacity: 0.8;
}

#prevBtn {
    background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
    height: 25px;
    width: 25px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
}

.step.active {
    opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
    background-color: #04AA6D;
}
</style>
@section("container")

<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center"> </h2>
<!--// main-heading -->

<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3">
        <p class="paragraph-agileits-w3layouts">
            <?php 
            $QuestionOrder=1;
                ?>
        <form id="regForm" action="/User/Test" method="post">
            {{csrf_field()}}
            @foreach($Quest as $question)
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
            <div style="float: right;">
            <?php
                    $imageDiagram=$question->diagram;
                    if(isset($imageDiagram)){
                        if(strlen($imageDiagram)>2){
                        ?>
                    <img src="/images/diagram/{{$question->diagram}}" style="max-width:100%;"/>
                    <?php
                    }}
                    ?>

            </div>
            <h4 class="mb-3">{{$QuestionOrder;}}). <?php echo nl2br($question->question); ?> </h4>
            
                <input type="hidden" name="question" value="{{$question->QuestionID}}" />
                <div class="d-block my-3">
                    <div class=" ">
                        <input id="optionSelected{{$question->QuestionID}}" name="optionSelected{{$QuestionOrder}}"
                            type="radio" style=" transform:scale(2);" value="1" required>
                        <label class="custom-control-label" for="optionSelected{{$question->QuestionID}}"
                            style="margin-left: 16px;;"> A.) {{$question->optionA}} </label>
                    </div>
                    <br />
                    <div class=" ">
                        <input id="optionSelected{{$question->QuestionID}}" name="optionSelected{{$QuestionOrder}}"
                            type="radio" style=" transform:scale(2);" value="2" required="">
                        <label class="custom-control-label" for="optionSelected{{$question->QuestionID}}"
                            style="margin-left: 16px;;"> B.) {{$question->optionB}} </label>
                    </div>
                    <br />
                    <div class=" ">
                        <input id="optionSelected{{$question->QuestionID}}" name="optionSelected{{$QuestionOrder}}"
                            type="radio" style=" transform:scale(2);" value="3" required="">
                        <label class="custom-control-label" for="optionSelected{{$question->QuestionID}}"
                            style="margin-left: 16px;;"> C.) {{$question->optionC}}</label>
                    </div>
                    <br />
                    <div class=" l ">
                        <input id="optionSelected{{$question->QuestionID}}" name="optionSelected{{$QuestionOrder}}"
                            type="radio" style=" transform:scale(2);" value="4" required="">
                        <label class="custom-control-label" for="optionSelected{{$question->QuestionID}}"
                            style="margin-left: 16px;;"> D.) {{$question->optionD}} </label>
                    </div>

                </div>

            </div>

            <?php $QuestionOrder=$QuestionOrder+1;?>
            @endforeach
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <?php 
                    $QuestionOrderfooter=1;
                        ?>
                @foreach($Quest as $question)
                <span class="step" style="font-size:16px;">{{$QuestionOrderfooter++}}</span>
                @endforeach
            </div>
        </form>

        </p>
    </div>
    <!--// Error Page Info -->

</div>

@section("footerContainer")

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    // y = x[currentTab].getElementsByTagName("input");
    SelectedOp = parseInt(currentTab) + parseInt('1');
    radiotoCheck = "optionSelected" + SelectedOp;
    //  alert(radiotoCheck);
    // y = x[currentTab].getElementsByClassName(radiotoCheck);
    y = document.getElementsByName(radiotoCheck);

    yzxc = document.querySelector(
        'input[name=' + radiotoCheck + ']:checked');
    // alert("optionSelected"+parseInt(currentTab)+parseInt('1'));
    // A loop that checks every input field in the current tab:
    // for (i = 0; i < y.length; i++) {

    //     // If a field is empty...
    //     if (y[i].checked == false) {
    //         // add an "invalid" class to the field:
    //         // y[i].className += " invalid";
    //         // and set the current valid status to false
    //         alert('choose answer');
    //         valid = false;
    //     }
    // }

    if (!yzxc) {
        alert('Hey ,' + "{{session()->get('fullname')}}" + '\nPlease, Select your Answer First ! ');
        // y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}
</script>
@endsection

@endsection