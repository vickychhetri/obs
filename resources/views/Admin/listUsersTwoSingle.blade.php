@extends('Admin.layout')
@section('title','Dashboard')

@section("container")

<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3">
        <p class="paragraph-agileits-w3layouts">
        <h3> Activate Post Test</h3>
        <hr />
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        @if (session('Error'))
        <div class="alert alert-danger">
            {{ session('Error') }}
        </div>
        @endif
        <?php 
if($OpenButton=="1"){
   if(isset($PressButon->PostButtonStatus)){
    if($PressButon->PostButtonStatus!="1"){
    ?>
        <a href="/User/Test/OpenPostTest/{{$UserIdetification->UserID}}" class="btn btn-danger"> Active Post Test
        </a><br /><br />
        <i>[Note: Once you active post test (when pressed above button), button will disapear. ]</i>
        <?php

    }else {
        ?>
        <h4 style="color: green;">Post Test:{{$PressButon->Message}} </h4>
        <?php 
    }   
}else {

?>
        <a href="/User/Test/OpenPostTest/{{$UserIdetification->UserID}}" class="btn btn-danger"> Active Post Test
        </a><br /><br />
        <i>[Note: Once you active post test (when pressed above button), button will disapear. ]</i>
        <?php
}    
}
?>

        </p>
    </div>
</div>

<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">{{$UserIdetification->name}} - Downloads</h2>
<!--// main-heading -->

<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3">
        <p class="paragraph-agileits-w3layouts">

            <b> Name: {{$UserIdetification->name}} &nbsp | &nbsp
                Email: {{$UserIdetification->email}} &nbsp | &nbsp
                Mobile: {{$UserIdetification->mobile}} &nbsp | &nbsp
                Created_at: {{$UserIdetification->created_at}} </b>
        <table class="table">
            <tr>
                <td colspan="3">
                    <center>
                        <h2> Section </h2>
                    </center>
                </td>
            </tr>
            <tr>
                <td>
                <a href="/User/Export/Test/{{$UserIdetification->UserID}}/PRE" class="btn btn-success">
                        Full-PRE-TEST Report <i style="font-size:24px" class="fa">&#xf1c3;</i></a>
                </td>
                <td>
                 
                </td>
                <td>
                    <a href="/User/Export/Test/{{$UserIdetification->UserID}}/POST" class="btn btn-success">
                        Full-POST-TEST Report <i style="font-size:24px" class="fa">&#xf1c3;</i></a>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <center>
                        <h2> Pre </h2>
                    </center>
                </td>
            </tr>
            <tr>
                <td >
             
                </td>
                <td>
                <a href="/User/Export/TestReport/{{$UserIdetification->UserID}}/PRE/1" class="btn btn-success">
                    STRUCTURED KNOWLEDEGE QUESTIONNAIRE<i style="font-size:24px" class="fa">&#xf1c3;</i> </a>
                </td>
                <td>
                </td>
                
            </tr>
            <tr>
                <td colspan="3">
                    <center>
                        <h2> POST </h2>
                    </center>
                </td>
            </tr>
            <tr>
            <td>
                
                </td>
                <td>
                    <a href="/User/Export/TestReport/{{$UserIdetification->UserID}}/POST/3"
                        class="btn btn-success">STRUCTURED KNOWLEDEGE QUESTIONNAIRE <i style="font-size:24px"
                            class="fa">&#xf1c3;</i></a>
                </td>
                <td>
                
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <center>
                        <h2> Feedback </h2>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <center> <a href="/User/FeedbackGenerate/{{$UserIdetification->UserID}}" class="btn btn-success">
                            Feedback <i style="font-size:24px" class="fa">&#xf1c3;</i></a> </center>
                </td>
            </tr>
        </table>
 
        </p>
        
        
        <div>
            
            <p>
  <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Video Auto-Complete Section (Status <33.33% : NOT ALLOWED)|  Danger
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
 
    
    
     <center> <h2 class="text-danger"> Do not Press This below button unless, you know what you are doing ! </h2>
     <p class="text-danger"> if user status is below 33.33% , don't try to click on button, otherwise it mess everything.
     
     NOT ALLOWED</p></center>
            <p class="text-center">
            
                <a href="/Admin/Set/Video/Seen/{{$UserIdetification->UserID}}" class="btn btn-danger"> Update All Videos to Seen</a>
  </div>
</div>
        
          @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
            </p>
        </div>
    </div>
    <!--// Error Page Info -->

</div>
@endsection