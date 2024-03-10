@extends('User.userarea.layout')
@section('title','Dashboard')

@section("metaContainer")
<style>
    /* Increase the size of the radio button */
    input[type="radio"]{
        transform: scale(2); /* Increase the size by a factor of 2 */
    }
</style>
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
                <h3> Match your answer ?</h3>
            </center>
        <form action="/User/Moudle23/Test" method="post">
            <!-- <input type="hidden" value="{{$UserID}}" name="parameter2" />  -->
            {{csrf_field()}}
            <?php
            $Z=1;
            ?>
            <input type="hidden" value="{{$ModuleQuestion->count()}}" name="parameter0" />
            <input type="hidden" value="{{$TYPE}}" name="parameter1" />
            <input type="hidden" value="{{$UserID}}" name="parameter2" />
            @php
            $ql=1;
            $Z=1;
            @endphp
            @foreach($ModuleQuestion as $question)
                <input type="hidden" value="{{$question->id}}" name="question{{$Z++}}" />
                <div class="quiz-question mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mb-2">{{$ql++}}). {{$question->index}}{{$question->Options}}?</h3>
                        </div>
                    </div>
                    <div class="options border p-4 m-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="m-2">
                                    <div class="mb-3">
                                        <input type="radio" id="answer{{$question->id}}" name="answer{{$question->id}}" value="1" required>
                                        <label for="option1" class="ml-2">A).{{$question->option1}}</label>
                                    </div>
                                    <div  class="mb-3">
                                        <input type="radio" id="answer{{$question->id}}" name="answer{{$question->id}}" value="2" required>
                                        <label for="option2" class="ml-2">B). {{$question->option2}}</label><br>
                                    </div>

                                </div>
                            </div>
                            @if($question->option_length!=2)

                            <div class="col-md-6">
                                <div class="m-2">
                                    <div  class="mb-3">
                                    <input type="radio" id="answer{{$question->id}}" name="answer{{$question->id}}" value="3" required>
                                    <label for="option3" class="ml-2">C). {{$question->option3}}</label><br>
                                    </div>
                                        <div  class="mb-3">

                                    <input type="radio" id="answer{{$question->id}}" name="answer{{$question->id}}" value="4" required>
                                    <label for="option4" class="ml-2">D). {{$question->option4}}</label><br>
                                        </div>
                                </div>
                            </div>

                            @endif
                        </div>



                </div>

            @endforeach
            <center> <input type="submit" value="Submit" class="btn btn-success" />
                <input type="reset" value="Reset" class="btn btn-dark" />
            </center>

        </form>
        <br /> <br />

        </p>
    </div>
    <!--// Error Page Info -->

</div>
@endsection
@section("footerContainer")


@endsection
