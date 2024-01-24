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

        <!-- Primary Meta Tags -->
        <title>Obstetric Emergencies | Learning Platform</title>
        <meta name="title" content="Obstetric Emergencies | Learning Platform">
        <meta name="description" content="Obstetric emergencies are health problems that are life-threatening for pregnant women and their babies.">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://obstetricalemergencies.in/">
        <meta property="og:title" content="Obstetric Emergencies | Learning Platform">
        <meta property="og:description" content="Obstetric emergencies are health problems that are life-threatening for pregnant women and their babies.">
        <meta property="og:image" content="https://obstetricalemergencies.in/images/mother.png">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://obstetricalemergencies.in/">
        <meta property="twitter:title" content="Obstetric Emergencies | Learning Platform">
        <meta property="twitter:description" content="Obstetric emergencies are health problems that are life-threatening for pregnant women and their babies.">
        <meta property="twitter:image" content="https://obstetricalemergencies.in/images/mother.png">


        <style>
            /* Add custom CSS to make modal backdrop transparent */
            .modal-backdrop {
                opacity: 0.7; /* Adjust the opacity as needed */
            }
        </style>

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

        <link rel="icon" href="/images/mother.png" type="image/x-icon" />

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
        <p>© 2024 Learn Obstetrical Emergencies . All Rights Reserved | Develop by Simarjeet Kaur  <a href="/privacy-policy"> Privacy Policy</a>
        </p>
{{--        <div class="overlay" id="welcomeOverlay">--}}
{{--            <div class="modal bg-danger">--}}
{{--                <h2 class="text-dark">Welcome to Our Learning Platform!</h2>--}}
{{--                <p>We're glad you're here. Explore our Obstetrical Emergencies learning content.</p>--}}
{{--                <button class="close-btn" onclick="closeWelcomeModal()">Close</button>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Welcome to Our Learning Platform!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>  Explore our Obstetrical Emergencies learning content.
                        </h3>
                        <p style="text-align: justify">While using this e- learning package, We may ask You to provide Us with certain personally identifiable information that can be used to contact or identify You. Personally identifiable information may includes:
                            <b>Email address,
                            First name and last name
                            Phone number,
                            Year of study,
                            Institute name </b>
                            The researcher will retain your Personal Data only for as long as is necessary for the purposes of research and confidentiality of your data and identity will be maintained. We will retain and use Your Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies.

                            The researcher will also retain collected Data for  analysis and interpretation purpose.
                            Your consent to this Privacy Policy followed by Your submission of such information represents Your agreement to the research study.</p>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
        <!-- Modal code -->

        <script>

            function checkFirstVisit() {
                return !localStorage.getItem('visitedBefore');
            }
            function closeWelcomeModal() {
                localStorage.setItem('visitedBefore', 'true');
            }

            window.addEventListener('load', function () {
                if (checkFirstVisit()) {
                    $('#exampleModal').modal('show');
                    closeWelcomeModal();
                }

                $('#exampleModal').on('click', function (e) {
                    if ($(e.target).hasClass('modal')) {
                        return false;
                    }
                });


                if(checkFirstVisit()){
                    $('#exampleModal').modal({
                        backdrop: 'static',  // Prevents closing by clicking outside the modal
                        keyboard: false      // Prevents closing by pressing the escape key
                    });
                }
            });

        </script>


  <script src="OuterArea/js/jquery.min.js"></script>
  <script src="OuterArea/js/popper.js"></script>
  <script src="OuterArea/js/bootstrap.min.js"></script>
  <script src="OuterArea/js/main.js"></script>



    </body>
</html>
