<!DOCTYPE html>
<html lang="en">

<head>
    <title> Learn Virtual-Login </title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Learn Virtual" />
    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- //Meta Tags -->

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
    <link rel="stylesheet" href="/OuterArea/css/style.css" />
</head>

<body>
    <div class="bg-page py-5">
        <div class="container">

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Admin Control Panel</h2>
            <!--// main-heading -->
            <div class="row">
                <div class="col-md-3">
                </div>
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
                        <form action="/Admin-Login" method="post">
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

                            <button type="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4">Login</button>
                        </form>

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