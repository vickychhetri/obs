@extends('User.userarea.layout')
@section('title','Dashboard')

@section("container")

<!-- Error Page Content -->
<div class="blank-page-content">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">


            <!-- Error Page Info -->
            <div class="outer-w3-agile mt-3">
                <p class="paragraph-agileits-w3layouts">
                <h4 class="tittle-w3-agileits mb-4">Candidate Personal Detail</h4>
                <p> <i style="color: red;">  Instructions:  Following are the items which are related to the study. Kindly go through them and give your right responses. 
                This information will be kept confidential and will only be used in the study. </i> </p>
                <br />
                <form action="/User/Demographic" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Age (In Years)</label>
                        <input type="number" class="form-control" name="age" id="exampleFormControlInput1"
                            placeholder="32" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Gender</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="gender" required>
                            <option value="">-</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Marital status</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="marital" required>
                            <option value="">-</option>
                            <option value="married">Married</option>
                            <option value="unmarried">Unmarried</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1Religion">Religion</label>
                        <select class="form-control" id="exampleFormControlSelect1Religion" name="Religion" onchange="yesnoCheckOther(this)" required>
                            <option value="">-</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Sikh">Sikh</option>
                            <option value="Christian">Christian</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        
                        <input type="text" class="form-control" id="otherreligion" style="display:none;"  name="otherreligion"
                            placeholder="Other Specify" required="">
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name of Institute</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="college"
                            placeholder="Guru Nanak Dev University" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">State</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="state"
                            placeholder="Punjab" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Year of study</label>
                        <!-- <input type="text" class="form-control" id="exampleFormControlInput1" name="yearStudy" placeholder="2020-23"
                            required=""> -->
                        <select class="form-control" id="exampleFormControlInput1" name="yearStudy" required>
                            <option value="">-</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="percentaScore">Percentage score in previous year examination</label>
                        <input type="text" class="form-control" id="percentaScore" name="percentScore"
                            placeholder="81.54%" required="">
                    </div>

                    <div class="form-group">
                        <label for="FOccupation">Father Occupation</label>
                        <select class="form-control" id="FOccupation" name="FOccupation"
                            onchange="yesnoCheckFather(this);" required>
                            <option value="">-</option>
                            <option value="1">Health Care Professional</option>
                            <option value="2">Others</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="fatherOccupation" style="display:none;"
                            name="fatherOccupation" placeholder="Specify Occupation Details" value="0" required>
                    </div>

                    <div class="form-group">
                        <label for="Occupation">Mother Occupation</label>
                        <select class="form-control" id="MOccupation" name="MOccupation" 
                        onchange="yesnoCheck(this);"
                            required>
                            <option value="">-</option>
                            <option value="1">Health Care Professional</option>
                            <option value="2">Others</option>
                        </select>
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" style="display:none;" id="motherOccupation"
                            name="motherOccupation" placeholder="Specify Occupation Details" value="0" required>
                    </div>


                    <div class="form-group">
                        <label for="Areaofinterest"> Area of interest in nursing </label>
                        <input type="text" class="form-control"  id="Areaofinterest"
                            name="Areaofinterest" placeholder="Area of interest in nursing" required>
                        </div>


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">   Do you prefer smart phone for studying purpose
                                ?</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="OnlineEducation"
                        required>
                            <option value="">-</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </div>
 

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Do you have previous knowledge regarding obstetrical emergencies?</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="inforRef"
                            onchange="yesnoCheckKnowledge(this);" required>
                            <option value="">-</option>
                            <option value="2">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">If yes, Specify the source of information </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" style="display:none;" rows="3"
                            name="infoRefExplanation" required=""></textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> Teaching method you prefer the most </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3"
                            name="teaching_method_prefer" required=""></textarea>
                    </div>
                   
                    <center>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Start" class="btn btn-danger" />
                        </div>
                    </center>
                </form>


                 
                </p>
            </div>

        </div>

    </div>
    <!--// Error Page Info -->

</div>
@endsection
@section("footerContainer")

<script>



function yesnoCheckOther(that) {
 if(that.value=="Other"){
    document.getElementById("otherreligion").style.display = "block";
        document.getElementById("otherreligion").value="";
    } else {
        document.getElementById("otherreligion").style.display = "none";
        document.getElementById("otherreligion").value="Other";
    }
}

function yesnoCheck(that) {
    if (that.value == "2") {
        //   alert("check");
        document.getElementById("motherOccupation").style.display = "block";
        document.getElementById("motherOccupation").value="";
    } else {
        document.getElementById("motherOccupation").style.display = "none";
        document.getElementById("motherOccupation").value="0";
    }
}

function yesnoCheckFather(that) {
    if (that.value == "2") {
        //   alert("check");
        document.getElementById("fatherOccupation").style.display = "block";
        document.getElementById("fatherOccupation").value="";
    } else {
        document.getElementById("fatherOccupation").style.display = "none";
        document.getElementById("fatherOccupation").value="0";
    }
}

function yesnoCheckKnowledge(that) {
    if (that.value == "1") {
        //   alert("check");
        document.getElementById("exampleFormControlTextarea1").style.display = "block";
        document.getElementById("exampleFormControlTextarea1").value="";
    } else {
        document.getElementById("exampleFormControlTextarea1").style.display = "none";
        document.getElementById("exampleFormControlTextarea1").value="0";
    }
}
</script>

@endsection