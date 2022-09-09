@extends('User.userarea.layout')
@section('title','Dashboard')

@section("metaContainer")

@endsection

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
        $z=1;
        ?>
            <center>
                <h3> Select your answer ?</h3>
            </center>
        <form action="/User/Moudle/Test" method="post">
            {{csrf_field()}}
            <?php 
            $Z=1;
            ?>
            <input type="hidden" value="{{$ModuleQuestion->count()}}" name="parameter0" />
            <input type="hidden" value="{{$TYPE}}" name="parameter1" />
           <input type="hidden" value="{{$UserID}}" name="parameter2" /> 
           @foreach($ModuleQuestion as $question)
            <div style="background-color:#0082ba;color:white;padding:16px;">
            <input type="hidden" value="{{$question->id}}" name="question{{$Z++}}" />   
                <span style="float: right;">
                    <select class="form-control" style="color:black;" name="answer{{$question->id}}" required>
                        <option value="">-</option>
                        <?php 
                        for($i=0;$i<$OptionSize;$i++){
                            ?>
                        <option value="{{$i+1}}">{{$OPTIONS[$i]}}</option>
                            <?php
                        }
                        ?>
                    </select>
                </span>
                <h4>{{$z++}}). {{$question->ASection}} </h4>
            </div>
            @endforeach
            <center> <input type="submit" value="Submit" class="btn btn-success btn btn-block" /> </center>

        </form>
        <br /> <br />
      
        </p>
    </div>
    <!--// Error Page Info -->

</div>
@endsection
@section("footerContainer")


@endsection