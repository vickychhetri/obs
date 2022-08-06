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
<!--            <b style="colo:black;"> This learning program deals with cardiovascular disorders in children. The content is prepared for undergraduate nursing students.</b>  -->
<!--            <hr> -->
<!--             <br />-->
<!--<h3> Algorithm/Steps </h3>-->
<!--    <hr> -->
<!--<ul style="font-weight:bold;">-->
<!--    <li>-->
<!--        1.) Pre-Test (can be attempted once only).-->
<!--    </li>-->
<!--    <li>-->
<!--        2.) Five modules (Video) (can be run repeatedly).-->
<!--    </li>-->
<!--    <li>-->
<!--       3.) Post-Test (Can be attempted once only).-->
<!--    </li>-->
   
<!--</ul>-->

 
       
     <br/>
<center> <img src="/images/IOs.drawio.png" style="max-width:100%;"/></center>
<ul style="float:right;">
          <br/>
     
     <ul>
       <li> 
     <a href="https://helpdesk.learnvirtual.in/" target="_blank" class="btn btn-danger"> Help Desk</a>
     </li>
</ul>

        <br /> <br />
        <span style="float: right;"> Amita </span>
        </p>
    </div>
    <!--// Error Page Info -->

</div>
@endsection