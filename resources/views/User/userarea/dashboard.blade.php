@extends('User.userarea.layout')
@section('title','Dashboard')

@section("container")

<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Welcome, {{session()->get('fullname') }} </h3>
<!--// main-heading -->

<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3">
        <p class="paragraph-agileits-w3layouts">
        <center>
            <a href="/User/Start-Course" class="btn btn-success btn-block">    
            Continue </a>
        </center>
        <br/>
                   <b>Instructions</b>
        <ul>
            <li>
                <i> • Dear participants, read the statement carefully and give your responses.    </i>
            </li>
            <li>
              <i>     • Select/Put mark in appropriate space provided. </i>
            </li>
            <li>
               <i>    • Don’t leave any question unanswered. </i>
            </li>
        </ul>
 

 
    
<ul style="float:right;">
          <br/>
     
     <ul>
       <li> 
     <a href="https://helpdesk.obstetricalemergencies.in/" target="_blank" class="btn btn-danger"> Help Desk</a>
     </li>
</ul>

        <br /> <br />
        <span style="float: right;"> Amita </span>
        </p>
    </div>
    <!--// Error Page Info -->

</div>
@endsection