<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- <title> Register </title> -->
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
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


 
    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- //Meta Tags -->

 

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
    <!-- add icon link -->
    <link rel="icon" href="/images/mother.png" type="image/x-icon" />
 
      <link rel="stylesheet" href="/OuterArea/css/style.css" />
</head>

<body>

<section class="ftco-section p-3">
            <div class="container">
                <div class="row justify-content-center p-0">
                    <div class="col-md-6 text-center p-0">
                     
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="login-wrap p-4 p-md-5 mb-5">
                                                <div class="text-center m-2">

                                                            <h2 class="heading-section bg-primary text-white rounded" >
                                                               Registration Form 
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
                            <form action="/Register" method="post" class="mt-3  ">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="fullName" class="form-control "
                                    placeholder="Enter your Name    " required="">
                                <span style="color:red;">
                                    @error('fullName')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="number" name="mobile" class="form-control"
                                    placeholder="Enter your Mobile    " required="">
                                <span style="color:red;">
                                    @error('mobile')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email"
                                    required="">
                                <span style="color:red;">
                                    @error('course')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required="">
                                <span style="color:red;">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Password" required="">
                                <span style="color:red;">
                                    @error('password_confirmation')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="termCondition"
                                    value="agree">
                                <label class="form-check-label" for="exampleCheck1">Agree the terms and policy</label>
                                <span style="color:red;">
                                    @error('termCondition')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <button type="submit"
                                class="btn btn-primary btn-block error-w3l-btn mt-sm-5 mt-3 px-4">Submit</button>  
                        </form>
                               
                        </div>
                      <center> 
                        <h3 class="text-center">   </h3>
                        <div class="" style="width:400px;max-width:100%;">
                            <a href="/" class="btn btn-primary" > Back to Login</a> 
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




















 

</body>

</html>