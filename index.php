
<!DOCTYPE html>
<?php
session_start();
$servername="localhost";
$username="root";
$password="nithin";
$db="ques";
$conn=mysqli_connect($servername,$username,$password,$db);

if (!$conn) {
    die("Connection failed:".mysqli_connect_error());
}

$phistory=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cnt FROM popularity WHERE category='History'"));
$ptech=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cnt FROM popularity WHERE category='Technology'"));
$pcurr=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cnt FROM popularity WHERE category='Current Affairs'"));
$pent=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cnt FROM popularity WHERE category='Entertainment'"));
$pspor=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cnt FROM popularity WHERE category='Sports'"));
$psci=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cnt FROM popularity WHERE category='Science'"));
$pgeo=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cnt FROM popularity WHERE category='Geography'"));
$pmov=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cnt FROM popularity WHERE category='Movies'"));
$pfam=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cnt FROM popularity WHERE category='Famous Personalities'"));


?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Qwizard</title>
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/mdbpr.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="https://fonts.googleapis.com/css?family=Londrina+Solid" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Marmelad" rel="stylesheet">




    <!-- <link href="css/style.css" rel="stylesheet"> -->
</head>
<style>
    body {
        overflow-x: hidden;
    }
    .swal-overlay {
        overflow-y: hidden;
    }

    body.modal-open-noscroll {
        padding-right: 0!important;
        overflow: hidden;
    }

    .modal-open-noscroll .navbar-fixed-top,
    .modal-open .navbar-fixed-bottom {
        padding-right: 0!important;
    }

    .o-text {
        font-size: 40px;
        color: white;
        font-family: 'Marmelad', sans-serif;
    }

    .carousel-thumbnails .carousel-inner .active {
        /* margin-bottom: 80px; */
        opacity: 0.8;
    }

    .r-text {
        font-size: 40px;
        color: black;
        font-family: 'Marmelad', sans-serif;
    }

    .text {
        font-family: 'Londrina Solid', cursive;
        font-size: 100px;
        color: black;
        text-shadow: 2px 2px white;
    }

    .navbar {
        background-color: transparent;
    }

    .scrolling-navbar {
        -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
        -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
        transition: background .5s ease-in-out, padding .5s ease-in-out;
    }

    .top-nav-collapse {
        background-color: #1f2833;
    }

    footer.page-footer {
        background-color: #1f2833;
        margin-top: 0;
    }

    @media only screen and (max-width: 768px) {
        .navbar {
            background-color: #1f2833;
        }
    }

    .indigo-text {
        font-family: Luckiest Guy, cursive;
        color: #66fcf1!important;
    }

    .lblue {
        color: #66fcf1!important;
    }

    .carousel-item:after {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.3)!important;
    }
    /* .x:click{
        outline: none!important;
    } */
    /* .modal-open .modal,.x:focus{
        outline:none!important
    } */
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar mb-4  fixed-top">

        <a class="navbar-brand lblue font-weight-bold" href="#">Qwizard</a>
        <ul class="navbar-nav mr-auto mt-lg-0 smooth-scroll">
            <li class="nav-item">
                <a class="nav-link" href="#cara">HOME
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#objective">OBJECTIVES <span class="sr-only">(current)</span></a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="#rules">RULES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#overview">FEATURES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#footer">ABOUT US</a>
            </li>
            <li class="nav-item x">
                <a class="nav-link " href="#pop" data-toggle="modal" data-target="#exampleModal" style="outline:none!important;">POPULARITY</a>
            </li>

        </ul>
        <ul class="navbar-nav  mt-lg-0 smooth-scroll">
            <li class="nav-item">
                <a class="nav-link lblue font-weight-bold" data-toggle="modal" data-target="#modalLRForm">REGISTER</a>
            </li>
        </ul>
    </nav>

    <div class="view intro hm-black-strong jarallax" data-jarallax='{"speed": 0.4}' style="background-image: url(img/qmark.jpeg); height: 1024px; background-size: cover;
    background-repeat: no-repeat;background-origin: initial;background-position: center;">


        <div class="full-bg-img">
            <div class="container">
                <div class="d-flex  d-flex justify-content-center" style="height: 850px">
                    <div class="row mt-5">
                        <div class="col-md-12 wow fadeIn mb-3">
                            <div class="intro-info-content text-center mt-4">
                                <h1 class="display-1 mb-2 wow twow animated fadeInDown" data-wow-delay="0.3s">
                                    <a class="indigo-text font-bold">QWIZARD</a>
                                </h1>
                                <h5 class="font-up mb-3 mt-1 font-bold wow animated fadeIn text-white" data-wow-delay="0.4s">An Online Interactive Quiz</h5>
                                <a id="cara" class="btn blue-gradient btn-lg wow fadeIn my-4" data-wow-delay="0.4s" data-toggle="modal" data-target="#modalLRForm">Register/Login</a>
                            </div>
                        </div>
                        <div class="col-md-12 text-center mb-3">

                            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner" role="listbox">
                                    <div class=" carousel-item  active">
                                        <img class="d-block w-100 " src="img/choose.jpeg" alt="First slide">
                                        <div class="carousel-caption">
                                            <h4 class="display-3 mb-2 wow fadeInDown" data-wow-delay="0.3s">
                                                <a class="text font-bold" style="color:#66fcf1; font-size:50px;">CHOOSE YOUR FAVOURITE CATEGORY</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item ">
                                        <img class="d-block w-100" src="img/spo.jpeg" alt="Zeroth slide">
                                        <div class="carousel-caption">
                                            <h4 class="display-3 mb-2 wow fadeInDown" data-wow-delay="0.3s">
                                                <a class="text font-bold" style="color:#66fcf1;">SPORTS</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/science.jpeg" alt="Second slide">
                                        <div class="carousel-caption">
                                            <h4 class="display-3 mb-2 wow fadeInDown" data-wow-delay="0.3s">
                                                <a class="text font-bold" style="color:#66fcf1;">SCIENCE</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/geography.jpeg" alt="Third slide">
                                        <div class="carousel-caption">
                                            <h4 class="display-3 mb-2 wow fadeInDown" data-wow-delay="0.3s">
                                                <a class="text font-bold" style="color:#66fcf1;">GEOGRAPHY</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/history.jpeg" alt="Fourth slide">
                                        <div class="carousel-caption">
                                            <h4 class="display-3 mb-2 wow fadeInDown" data-wow-delay="0.3s">
                                                <a class="text font-bold" style="color:#66fcf1;">HISTORY</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/person.jpeg" alt="Fifth slide">
                                        <div class="carousel-caption">
                                            <h4 class="display-3 mb-2 wow fadeInDown" data-wow-delay="0.3s">
                                                <a class="text font-bold" style="color:#66fcf1;">FAMOUS PERSONALITIES</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/currentaffairs.jpeg" alt="Sixth slide">
                                        <div class="carousel-caption">
                                            <h4 class="display-3 mb-2 wow fadeInDown" data-wow-delay="0.3s">
                                                <a class="text font-bold" style="color:#66fcf1;">CURRENT AFFAIRS</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/entert.jpeg" alt="Seventh slide">
                                        <div class="carousel-caption">
                                            <h4 class="display-3 mb-2 wow fadeInDown" data-wow-delay="0.3s">
                                                <a class="text font-bold" style="color:#66fcf1;">ENTERTAINMENT</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/movies.jpeg" alt="Eighth slide">
                                        <div class="carousel-caption">
                                            <h4 class="display-3 mb-2 wow fadeInDown" data-wow-delay="0.3s">
                                                <a class="text font-bold" style="color:#66fcf1;">MOVIES</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/techno.jpeg" alt="Ninth slide">
                                        <div class="carousel-caption">
                                            <h4 class="display-3 mb-2 wow fadeInDown" data-wow-delay="0.3s">
                                                <a class="text font-bold" style="color:#66fcf1;">TECHNOLOGY</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Slides-->
                                <!--Controls-->
                                <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <!--/.Controls-->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                                        <img class="d-block w-100" src="img/s_choose.jpeg" class="img-fluid">
                                    </li>
                                    <li data-target="#carousel-thumb" data-slide-to="1">
                                        <img class="d-block w-100" src="img/s_sports.jpeg" class="img-fluid">
                                    </li>
                                    <li data-target="#carousel-thumb" data-slide-to="2">
                                        <img class="d-block w-100" src="img/s_science.jpeg" class="img-fluid">
                                    </li>
                                    <li data-target="#carousel-thumb" data-slide-to="3">
                                        <img class="d-block w-100" src="img/s_geography.jpeg" class="img-fluid">
                                    </li>
                                    <li data-target="#carousel-thumb" data-slide-to="4">
                                        <img class="d-block w-100" src="img/s_history.jpeg" class="img-fluid">
                                    </li>
                                    <li data-target="#carousel-thumb" data-slide-to="5">
                                        <img class="d-block w-100" src="img/s_person.jpeg" class="img-fluid">
                                    </li>
                                    <li data-target="#carousel-thumb" data-slide-to="6">
                                        <img class="d-block w-100" src="img/s_currentaffairs.jpeg" class="img-fluid">
                                    </li>
                                    <li data-target="#carousel-thumb" data-slide-to="7">
                                        <img class="d-block w-100" src="img/s_entertainment.jpeg" class="img-fluid">
                                    </li>
                                    <li data-target="#carousel-thumb" data-slide-to="8">
                                        <img class="d-block w-100" src="img/s_movies.jpeg" class="img-fluid">
                                    </li>
                                    <li data-target="#carousel-thumb" data-slide-to="9">
                                        <img class="d-block w-100" src="img/s_tech.jpeg" class="img-fluid">
                                    </li>

                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- <div id="objective" class="view intro hm-stylish-strong jarallax" data-jarallax='{"speed": 0.1}' style="background-image: url(img/objective.jpeg);">
        <div class="full-bg-img">
            <div class="container">
                <div class="" style="height: 700px">
                    <div class="row mt-5">
                        <div class="col-md-12 wow fadeIn mb-3">
                            <div class="intro-info-content text-center">
                                <h1 class="font-bold lblue mb-3" style="font-family:Luckiest Guy,cursive;font-size:63px">OBJECTIVES</h1>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div id="rules" style="background-color:#252526;height:100vh;">
        <!-- <div class="container' class="mt-0"> -->

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12 text-center my-3">
                    <br>

                    <p align="justify">
                        <h1 class="font-bold lblue mb-3" style="font-family:Luckiest Guy,cursive;font-size:63px">RULES</h1>
                        <p align="justify" class="r-text font-bold white-text" style="margin-left:3em;">
                            <span class="mr-2 p-2 fa fa-check-circle"></span>Choose one of 9 categories.</p>
                        <p align="justify" class="r-text font-bold white-text" style="margin-left:3em;">
                            <span class="mr-2 p-2 fa fa-check-circle"></span>You will have seven questions to answer.</p>
                        <p align="justify" class="r-text font-bold white-text" style="margin-left:3em;">
                            <span class="mr-2 p-2 fa fa-check-circle"></span>You must answer each question within 10 seconds.</p>
                        <p align="justify" class="r-text font-bold white-text" style="margin-left:3em;">
                            <span class="mr-2 p-2 fa fa-check-circle"></span>Quitting between the quiz is not allowed.</p>
                    </p>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        <!-- </div> -->
    </div>




    <div id="overview" class="view intro hm-black-strong jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(img/objective.jpeg);">
        <div class="full-bg-img">
            <div class="container">
                <div class="" style="height: 700px">
                    <div class="row mt-5">
                        <div class="col-md-12 wow fadeIn mb-3">
                            <div class="intro-info-content text-center">
                                <h1 class="font-bold lblue mb-3" style="font-family:Luckiest Guy,cursive;font-size:63px;margin-bottom:50px;">FEATURES</h1>
                                <p align="justify" class="o-text font-bold mt-4">
                                    <span class="mr-2 p-2 fa fa-check-square"></span>View your stats with graphs and tables
                                </p>
                                <p align="justify" class="o-text font-bold">
                                    <span class="mr-2 p-2 fa fa-check-square"></span>Compete with other players</p>
                                <p align="justify" class="o-text font-bold">
                                    <span class="mr-2 p-2 fa fa-check-square"></span>Get scores which are fair and unbiased</p>
                                <p align="justify" class="o-text font-bold">
                                    <span class="mr-2 p-2 fa fa-check-square"></span>Test your knowledge in multiple categories
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mt-3">
                            <img src="img/Beginner.png" alt="" border=3 height=100 width=100></img>
                            <h2 style="color:white;" class="mt-2">Beginner</h2>
                        </div>
                        <div class="col-4 mt-3">
                            <img src="img/Apprentice.png" alt="" border=3 height=100 width=100></img>
                            <h2 style="color:white;" class="mt-2">Apprentice</h2>
                        </div>
                        <div class="col-4 mt-3">
                            <img src="img/Expert.png" alt="" border=3 height=100 width=100></img>
                            <h2 style="color:white;" class="mt-2">Expert</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer center-on-small-only elegant-color-dark" id="footer">

        <!--Footer Links-->
        <div class="container">
            <div class="row">

                <!--First column-->
                <div class="col-md-3">
                    <h5 class="title">About Us</h5>
                </div>
                <!--/.First column-->

                <hr class="w-100 clearfix d-md-none">

                <!--Second column-->
                <div class="col-md-2 mx-auto">
                    <h5 class="title">Team</h5>
                    <ul>
                        <li>
                            <a href="#!">Aishwarya</a>
                        </li>
                        <li>
                            <a href="#!">Nithin</a>
                        </li>
                        <li>
                            <a href="#!">Raghav</a>
                        </li>
                    </ul>
                </div>
                <!--/.Second column-->

                <hr class="w-100 clearfix d-md-none">

                <!--Third column-->
                <div class="col-md-2 mx-auto">
                    <h5 class="title">USN</h5>
                    <ul>
                        <li>
                            <a href="#!">1MV15IS004</a>
                        </li>
                        <li>
                            <a href="#!">1MV15IS025</a>
                        </li>
                        <li>
                            <a href="#!">1MV15IS035</a>
                        </li>
                    </ul>
                </div>
                <!--/.Third column-->

                <hr class="w-100 clearfix d-md-none">

                <!--Fourth column-->
                <!-- <div class="col-md-2 mx-auto">
                    <h5 class="title">Links</h5>
                    <ul>
                        <li><a href="#!">Link 1</a></li>
                        <li><a href="#!">Link 2</a></li>
                        <li><a href="#!">Link 3</a></li>
                        <li><a href="#!">Link 4</a></li>
                    </ul>
                </div> -->
                <!--/.Fourth column-->

            </div>
        </div>
        <!--/.Footer Links-->

        <hr>

        <!--Call to action-->
        <div class="call-to-action">
            <ul>
                <li>
                    <h5>Register for free</h5>
                </li>
                <li>
                    <a href="" data-toggle="modal" data-target="#modalLRForm" class="btn btn-primary waves-effect waves-light">Sign up!</a>
                </li>
            </ul>
        </div>
        <!--/.Call to action-->

        <hr>

        <!--Social buttons-->
        <div class="social-section text-center">
            <ul>
                <li>
                    <a class="btn-floating btn-fb waves-effect waves-light">
                        <i class="fa fa-facebook"> </i>
                    </a>
                </li>
                <!-- <li><a class="btn-floating btn-tw waves-effect waves-light"><i class="fa fa-twitter"> </i></a></li> -->
                <li>
                    <a class="btn-floating btn-gplus waves-effect waves-light">
                        <i class="fa fa-google-plus"> </i>
                    </a>
                </li>
                <li>
                    <a class="btn-floating btn-li waves-effect waves-light">
                        <i class="fa fa-linkedin"> </i>
                    </a>
                </li>
                <li>
                    <a class="btn-floating btn-git waves-effect waves-light">
                        <i class="fa fa-github"> </i>
                    </a>
                </li>
            </ul>
        </div>
        <!--/.Social buttons-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2018 Copyright:
                <a href="#"> Qwizard.com </a>

            </div>
        </div>
        <!--/.Copyright-->

    </footer>


    <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">


                <div class="modal-c-tabs">


                    <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="logintab" data-toggle="tab" href="#panel7" role="tab">
                                <i class="fa fa-user mr-1"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="signuptab" data-toggle="tab" href="#panel8" role="tab">
                                <i class="fa fa-user-plus mr-1"></i> Register</a>
                        </li>
                    </ul>


                    <div class="tab-content">

                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">


                            <div class="modal-body mb-1">
                                <div class="md-form form-sm">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="text" id="form22" class="form-control validate" required>
                                    <label for="form22">Your Username</label>
                                </div>

                                <div class="md-form form-sm">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" id="form23" class="form-control validate" required>
                                    <label for="form23">Your password</label>
                                </div>
                                <div class="text-center mt-2" id="login">
                                    <button class="btn btn-info">Log in
                                        <i class="fa fa-sign-in ml-1"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div class="options text-center text-md-right mt-1">
                                    <p>Not a member?
                                        <a href="#" class="blue-text" id="signuplink">Sign Up</a>
                                    </p>
                                </div>
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                            </div>

                        </div>


                        <div class="tab-pane fade" id="panel8" role="tabpanel">


                            <div class="modal-body">
                                <div class="md-form form-sm">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="text" id="form24" class="form-control validate">
                                    <label for="form24">Your Username</label>
                                </div>

                                <div class="md-form form-sm">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" id="form25" class="form-control validate">
                                    <label for="form25">Your password</label>
                                </div>

                                <div class="md-form form-sm">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" id="form26" class="form-control validate">
                                    <label for="form26">Repeat password</label>
                                </div>

                                <div class="text-center form-sm mt-2">
                                    <button class="btn btn-info" id="signup">Sign up
                                        <i class="fa fa-sign-in ml-1"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <div class="options text-right">
                                    <p class="pt-1">Already have an account?
                                        <a href="#" class="blue-text" id="loginlink">Log In</a>
                                    </p>
                                </div>
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Popularity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <canvas id="barChart"></canvas>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript" src="js/mdbpr.min.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script>
    var gspor = parseInt("<?php echo $pspor['cnt'];?>");
    var gsci = parseInt("<?php echo $psci['cnt'];?>");
    var ggeo = parseInt("<?php echo $pgeo['cnt'];?>");
    var ghis = parseInt("<?php echo $phistory['cnt'];?>");
    var gfam = parseInt("<?php echo $pfam['cnt'];?>");
    var gcurr = parseInt("<?php echo $pcurr['cnt'];?>");
    var gent = parseInt("<?php echo $pent['cnt'];?>");
    var gmov = parseInt("<?php echo $pmov['cnt'];?>");
    var gtech = parseInt("<?php echo $ptech['cnt'];?>");
    var ctxB = document.getElementById("barChart").getContext('2d');
    var myBarChart = new Chart(ctxB, {
      type: 'bar',
      data: {
          labels: ["Sports", "Science", "Geography", "History", "Famous Personalities", "Current Affairs","Entertainment","Movies","Technology"],
          datasets: [{
              label: '# of times played',
              data: [gspor, gsci, ggeo, ghis, gfam, gcurr,gent,gmov,gtech],
              backgroundColor: [
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(54, 162, 235, 0.5)'

              ],
              borderColor: [

                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)'
              ],
              borderWidth: 1
          }]
      },
      optionss: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }],
          }
      }
    });
    </script>
    <!-- <script src="libs/x-tag-core.min.js"></script>
    <script src="templates/progress-bars.js"></script>
    <circular-progress-bar id="bar-1" barsize=2 barcolor="#FFFFFF" filledcolor="#8B3626" progressStringFormat="{p}" displayTextWhenDone="false"
        circlesize=80 progress=50></circular-progress-bar> -->
    <script>
        // $(".btn-mc").click(function () {
        //     $(this).blur();
        // });
        $('.twow').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
            $('.twow').removeClass('animated fadeInDown');
            $('.twow').addClass('animated pulse infinite');
        });
        $(document).ready(function () {
            $('.modal').on('show.bs.modal', function () {
                if ($(document).height() > $(window).height()) {
                    // no-scroll
                    $('body').addClass("modal-open-noscroll");
                }
                else {
                    $('body').removeClass("modal-open-noscroll");
                }
            });
            $('.modal').on('hide.bs.modal', function () {
                $('body').removeClass("modal-open-noscroll");
            });
        })
        $("#loginlink").click(function () {
            $("#logintab").trigger("click");
        });
        $("#signuplink").click(function () {
            $("#signuptab").trigger("click");
        });
        $("#signup").click(function () {
            email = $("#form24").val();
            pass1 = $("#form25").val();
            pass2 = $("#form26").val();

            if (email != '' && pass1 != '' && pass2 != '') {
                if (pass1 === pass2) {
                    $.ajax({
                        url: "php/signup.php",
                        method: "POST",
                        data: {
                            email: email,
                            pass1: pass1,
                            pass2: pass2
                        },
                        success: function (data) {
                            $("#form24").val('');
                            $("#form25").val('');
                            $("#form26").val('');
                            if (data == 'Success') {
                                window.location = "nav.php";
                            } else console.log(data);
                        }

                    });
                } else swal("Error!", "Your passwords do not match", "error");
            } else swal("Error!", "Please enter all the fields", "error")
        });
        $("#login").click(function () {
            var lemail = $("#form22").val();
            var lpass = $("#form23").val();

            if (lemail != '' && lpass != '') {
                $.ajax({
                    url: "php/login.php",
                    method: "POST",
                    data: {
                        lemail: lemail,
                        lpass: lpass
                    },
                    success: function (data) {
                        if (data == 'Matching') {
                            window.location = "nav.php";
                        } else {
                            $("#form22").val('');
                            $("#form23").val('');
                            swal("Error!",
                                "The username or password which you have entered is incorrect",
                                "error");
                        }
                    }
                });
            } else swal("Error!", "Enter all the fields.", "error");
        });
    </script>
</body>

</html>
