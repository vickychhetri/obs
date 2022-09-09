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
        <title>Forgot  </title>
        <meta
            name="title"
            content="Forgot"
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
                            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                    
                    <p> Contact Administrator to Obtain Password.</p>
                      <p class="paragraph-agileits-w3layouts mt-2">
                                               <a href="https://helpdesk.obstetricalemergencies.in/"> Click Here to Go Help Desk</a>
        </p>
                                           <p> Submit a Ticket or Drop email at info@obstetricalemergencies.in</p>
                                            <h1 class="paragraph-agileits-w3layouts mt-2">
                                               <a href="/"> Login </a>
                                           </h1>
                                           <p class="paragraph-agileits-w3layouts mt-4">Don't have an account
                                               <a href="/Register">Create an account</a>
                                           </p>
                                        
                                       </div>
                        </div>
                   
                    </div>
                   
                </div>
               
            </div>
            
        </section>
    <!-- Copyright -->
    <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
        <p>© 2022 Learn Obstetrical Emergencies . All Rights Reserved | Develop by Simarjeet Kaur
        </p>
    </div>
 

  <noscript>
    <style type="text/css">
        .pagecontainer {display:none;}
    </style>
    
    <div class="noscriptmsg">
        <br/>
        <br/>
        <center> 
    You don't have javascript enabled.  Good luck with that or Enable Sites can use Javascript.
     </center>
    </div>
</noscript>
    </body>
</html>
