<?php
session_start();

?>
<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Qwizard</title>
    <!-- Font Awesome -->
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two|Nunito|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap4.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <style>
        .swal-overlay{
            overflow-y: hidden;
        }

        .swal-button{
            background-color: #f27474;
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
        }

        *{
            font-family: 'Open Sans', sans-serif;
            font-weight:550;
            /* font-size: 17px;     */
        }

        #head{
          font-family:'Lobster Two';
          /* font-size:50px; */
          font-weight:bold;
        }

        .navbar{
          background-color:#0b0c10;
        }
    </style>
</head>

<body class="ani" style="background-color: #0b0c10; background-image: url(img/inspiration-geometry.png);padding-right:0px;">

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand font-weight-bold" href="#" style="color:#66fcf1;">Qwizard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a id="home" class="nav-link" data-toggle="tab" href="">HOME
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="categories" class="nav-link" data-toggle="tab" href="">CATEGORIES</a>
                </li>
                <li class="nav-item">
                    <a id="contribute" class="nav-link" data-toggle="tab" href="#">CONTRIBUTE</a>
                </li>
                <li class="nav-item">
                    <a id="leaders" class="nav-link" data-toggle="tab" href="#">LEADERBOARDS</a>
                </li>
                <li class="nav-item">
                    <a id="report" class="nav-link" data-toggle="tab" href="#">REPORTS</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" id="logout">LOGOUT</a>
                </li>
            </ul>

        </div>
    </nav>
    <div class="jumbotron jumbotron-ti text-center p-1 mb-4 z-depth-1" style="border-radius:0px; background-color:#67afac">
        <h1 id="head" class="h1" style="">Welcome <?php echo $_SESSION['name'];?></h1>
    </div>
    <div id="cat"></div>


</body>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="js/popper.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/mdb.min.js"></script>

<script type="text/javascript" src="js/sweetalert.min.js"></script>

<script src="libs/x-tag-core.min.js"></script>
<script src="templates/progress-bars.js"></script>

<script>
    name=$("#head").html();
    name=name.slice(8);
    $(".nav-item").on("click", function() {
      $(".nav-item").removeClass("active");
      $(this).addClass("active");
    });

    $.get("profile.php", function (data, status) {
        $("#cat").html(data);
    });

    $("#categories").click(function () {
        // var tS=new Date().getTime();
        $.get("cat.html", function (data, status) {
            $("#cat").html(data);
            $("#head").html("Categories");
        })
    });

    $("#home").click(function () {
        location.reload();
        $.get("profile.php", function (data, status) {
            $("#cat").html(data);
            $("#head").html("Welcome " + name);
        })
    });

    $("#contribute").click(function () {
        $.get("qadd.html", function (data, status) {
            $("#cat").html(data);
            $("#head").html("Contribute");
        })
    });
    $("#leaders").click(function () {
        $.get("hscores.html", function (data, status) {
            $("#cat").html(data);
            $("#head").html("Leaderboards");
        })
    });
    $("#report").click(function () {
        $.get("report.html", function (data, status) {
            $("#cat").html(data);
            $("#head").html("Reports");
        })
    });
    $("#logout").click(function(){
        var action="logout";
        $.ajax({
            url:"php/logout.php",
            method:"POST",
            data:{action:action},
            success:function(data){
                window.location="index.php";
            }
        });
    });
</script>

</html>
