<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title> @yield('title')</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta charset="utf-8">
    <meta name="keywords" content="obstetrical, emergencies , obstetricalemergencies" />
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
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="/css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="/css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->
    <!-- add icon link -->
    <link rel="icon" href="/images/activity.svg" type="image/x-icon">

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!--//web-fonts-->
 
    <style>
    #nav ul {
        margin-top: 0;
    }
    </style>
    @section("metaContainer")
    @show
</head>

<body >
    <div class="pagecontainer ">
        
    <div class="wrapper"  >
        <!-- Sidebar Holder -->
        <x-User.Navigation />
        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>

                    </div>
                    <!-- Search-from -->

                    <form action="#" method="post" class="form-inline mx-auto search-form">
                        <h3> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="red"
                                class="bi bi-activity" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
                            </svg> {{session()->get('fullname') }} </h3>
                        <x-Coursefullstatus />
                    </form>
                    <!--// Search-from -->
                    <!-- <ul class="top-icons-agileits-w3layouts float-right"> -->
                    <!-- <li class="nav-item dropdown"> -->
                    <a class="nav-link" href="/noaccess" id="navbarDropdown3" role="button" style="float: right;">
                        <i class="far fa-user" style="color:blue;"></i> Logout
                    </a>
                    <!-- <div class="dropdown-menu" style="max-width:100%;">
                        <a class="dropdown-item" href="">Logout</a>
                    </div> -->

                    <!-- </li> -->
                    <!-- </ul> -->


                </div>
            </nav>
            <!--// top-bar -->
            @section("container")
            @show

            <!--// Error Page Content -->

            <!-- Copyright -->
            <!-- <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
                <p>© 2022 Learb Virtual Platform India . All Rights Reserved                 </p>
            </div> -->
            <!--// Copyright -->
        </div>
    </div>


    <!-- Required common Js -->
    <script src='/js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- dropdown nav -->
    <script>
    $(document).ready(function() {
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="/js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->
    <script>
    //Menu system
    $('#nav > li').hover(function() {
        //show its submenu
        $('ul', this).slideDown(100);
    }, function() {
        //hide its submenu
        $('ul', this).slideUp(100);
    });
    </script>
    <script>
    $(document).bind("contextmenu", function(e) {
        return false;
    });
    </script>
      </div>
    @section("footerContainer")
    @show
   
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