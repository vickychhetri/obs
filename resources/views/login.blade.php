<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- <title> Learn Virtual-Login </title> -->
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta charset="utf-8">
    <meta name="keywords" content="obstetrical emergencies" />

    <!-- Primary Meta Tags -->
    <title>Online Learning Platform - Login</title>
    <meta name="title" content="Online Learning Virtual  Platform - Login">
    <meta name="description"
        content="Obstetric emergencies are health problems that are life-threatening for pregnant women and their babies.">
 

    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- //Meta Tags -->
    <!-- add icon link -->
    <link rel="icon" href="/images/activity.svg" type="image/x-icon">

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
 
</head>

<body>	 
    <div class="bg-page py-5">
        <div class="container">

            <!-- main-heading -->
            <h2 class="mb-2 text-center text-white font-weight-bold" style="font-size:50px;font-family:times new roman;">Obstetrical Emergencies </h2>
            <!--// main-heading -->
            <div class="row">
           
               
                <div class="col-md-6">

                    <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
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

                        <form action="/Login" method="post">
                        <h3 class="text-center"> Sign In </h3>    <br/>
                        {{csrf_field()}}
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    required="">
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="form-check col-md-6 text-sm-left text-center">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                </div>
                                <div class="forgot col-md-6 text-sm-right text-center">
                                    <!-- <a href="">forgot password?</a> -->
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary  mt-sm-5 mt-3 px-4">Login</button>
                        </form>

                        <p class="paragraph-agileits-w3layouts mt-4">Don't have an account
                            <a href="/Register">Create an account</a>
                        </p>
                        <h1 class="paragraph-agileits-w3layouts mt-2">
                            <a href="https://helpdesk.obstetricalemergencies.in/">Help Desk</a>
                        </h1>
                    </div>

                </div>
        
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div>
                                <h1 class="mb-2 text-center text-white font-weight-bold" style="font-size:50px;font-family:times new roman;"> </h1>
                                <img src="/images/common/main.png"  class="w-100"/>
                        </div>
                   
                    </div>

            </div>
            <!-- Copyright -->
            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
                <p>© 2022 Learn Obstetrical Emergencies . All Rights Reserved | Develop by Simarjeet Kaur
                </p>
            </div>
            <!--// Copyright -->
        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>