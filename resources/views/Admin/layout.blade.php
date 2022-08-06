<!DOCTYPE html>
<html lang="en">

<head>
    <title> @yield('title')</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Learn Virtual, Amita web, PHD Data " />
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
    <link href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
    @section("metaContainer")
    @show
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <x-Admin.Navigation />
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
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                            required="">
                        <button class="btn btn-style my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <!--// Search-from -->
                    <a class="nav-link" href="/noaccess2" id="navbarDropdown3" role="button" style="float: right;">
                        <i class="far fa-user" style="color:blue;"></i> Logout
                    </a>
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
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#myTableList').DataTable();
    });
    </script>

    <!-- //Js for bootstrap working -->

</body>

</html>