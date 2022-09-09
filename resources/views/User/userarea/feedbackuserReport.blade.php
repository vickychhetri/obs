@extends('User.userarea.layout')
@section('title','Dashboard')

@section("container")


<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3">
        <p class="paragraph-agileits-w3layouts">
            <center>
                <h3> Acceptability and Utility Opinionnaire</h3>
                <br/>
                <img src="/images/feedbackObs.png" style="max-width: 100%;"/>
                <br/><br/>
            </center>
        <ol>

            @foreach($FEEDBACK as $feed)
            <li>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                        {{$feed->item }}
                        </div>
                        <div class="col-md-4">
                        <center> <b> - {{$feed->Answer }} </b> </center>
                        </div>
                    </div>
                </div>
<hr/>
              

            </li>
            @endforeach

        </ol>
    
        </p>
    </div>
    <!--// Error Page Info -->

</div>
@endsection