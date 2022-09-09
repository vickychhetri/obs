<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- <title> Learn Virtual-Login </title> -->
        <!-- Meta Tags -->
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1,user-scalable=no"
        />
        <meta charset="utf-8" />
        <meta name="keywords" content="obstetrical emergencies" />

        <!-- Primary Meta Tags -->
        <title>Obstetric Emergencies | Learning Platform </title>
        <meta
            name="title"
            content="Obstetric Emergencies | Learning Platform"
        />
        <meta
            name="description"
            content="Obstetric emergencies are health problems that are life-threatening for pregnant women and their babies."
        />

        <script>
            addEventListener(
                "load",
                function () {
                    setTimeout(hideURLbar, 0);
                },
                false
            );

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!-- //Meta Tags -->

        <link rel="icon" href="/images/activity.svg" type="image/x-icon" />

        <!--web-fonts-->
        <link
            href="//fonts.googleapis.com/css?family=Poiret+One"
            rel="stylesheet"
        />
        <link
            href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
            rel="stylesheet"
        />
        <!--//web-fonts-->
        <link
            href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
            rel="stylesheet"
        />

        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <link rel="stylesheet" href="/OuterArea/css/style.css" />
    </head>

    <body>
        <section class="ftco-section p-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">
                            Obstetrical Emergencies 
                        </h2>

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
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="login-wrap p-4 p-md-5 mb-5">
                            <div
                                class="icon d-flex align-items-center justify-content-center"
                            >
                                <span class="fa fa-user-o"></span>
                            </div>
                            <h3 class="text-center mb-4">Have an account?</h3>
                 
                                <form action="/Login" method="post" class="login-form">
                                {{csrf_field()}}
                                

                                <div class="form-group">
                                    <input
                                        type="email"
                                        class="form-control rounded-left"
                                        placeholder="Email"
                                        name="email" 
                                        required
                                    />
                                </div>
                                <div class="form-group d-flex">
                                    <input
                                        type="password"
                                        class="form-control rounded-left"
                                        placeholder="Password"
                                        name="password"
                                        required
                                    />
                                </div>


                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <label
                                            class="checkbox-wrap checkbox-primary"
                                            >Remember Me
                                            <input type="checkbox" checked />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="/forgot">Forgot Password</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button
                                        type="submit"
                                        class="btn btn-primary rounded submit p-3 px-5"
                                    >
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                      <center> 
                        <h3 class="text-center">   </h3>
                        <div class="" style="width:400px;max-width:100%;">
                            <a href="/Register" class="btn btn-primary" > Create New Account</a>   <a href="https://helpdesk.obstetricalemergencies.in/" class="btn btn-primary" > Help Desk</a>
                        </div>
                      </center>
                    </div>
                   
                </div>
               
            </div>
            
        </section>
    <!-- Copyright -->
    <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
        <p>© 2022 Learn Obstetrical Emergencies . All Rights Reserved | Develop by Simarjeet Kaur
        </p>
    </div>
    <!--// Copyright -->
        <!-- <script src="OuterArea/js/jquery.min.js"></script>
  <script src="OuterArea/js/popper.js"></script>
  <script src="OuterArea/js/bootstrap.min.js"></script>
  <script src="OuterArea/js/main.js"></script> -->
    </body>
</html>
