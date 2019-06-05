<?php
session_start();
$servername="localhost";
$username="root";
$password="nithin";
$db="ques";
$name=$_SESSION['name'];
$conn=mysqli_connect($servername,$username,$password,$db);

if (!$conn) {
    die("Connection failed:".mysqli_connect_error());
}

$lvl=mysqli_fetch_assoc(mysqli_query($conn,"SELECT levelname,exp FROM level WHERE username='$name'"));

$best=mysqli_fetch_assoc(mysqli_query($conn,"SELECT category FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE username='$name')"));

$history=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='History')"));
$tech=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Technology')"));
$curr=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Current Affairs')"));
$ent=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Entertainment')"));
$spor=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Sports')"));
$sci=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Science')"));
$geo=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Geography')"));
$mov=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Movies')"));
$fam=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Famous Personalities')"));

$uhistory=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='History' AND username='$name')"));
$utech=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Technology' AND username='$name')"));
$ucurr=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Current Affairs' AND username='$name')"));
$uent=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Entertainment' AND username='$name')"));
$uspor=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Sports' AND username='$name')"));
$usci=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Science' AND username='$name')"));
$ugeo=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Geography' AND username='$name')"));
$umov=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Movies' AND username='$name')"));
$ufam=mysqli_fetch_assoc(mysqli_query($conn,"SELECT score FROM userstats WHERE score=(SELECT MAX(score) FROM userstats WHERE category='Famous Personalities' AND username='$name')"));

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!-- Bootstrap core CSS -->


  <link href="css/bootstrap4.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- <link href="libs/jquery.mCustomScrollbar.min.css" rel="stylesheet"> -->
  <style>
    /* *{
      overflow:hidden;
    } */
  
    .btn-cust {
      width: 90%;
    }

    /* .jumbotron-title {
      padding: 0.5em;
      background: grey;
    } */

    .progress {
      height: 1vh;
      width: 90%;
      margin: auto;
    }

    .scroll-class {
      height: 24em;
      overflow-y: scroll;
    }

    /* body {
      background-color: #1c2331;
      background-image: url(img/cubes.png) 898955;
    } */

    .card {
      background-color: #1f2833;
    }

    .ctitle {
      background-color: #45a29e;
      /* background:-webkit-radial-gradient(center, ellipse cover, rgba(149,7,64,1) 0%, rgba(111,34,50,1) 100%); */
      /* background: -webkit-radial-gradient(center, ellipse cover, #c3073f 0%, #9f0740 100%); */
      /* background: -webkit-linear-gradient(45deg, #950740 0%, #6f2232 100%); */
      /* background:-webkit-radial-gradient(center, ellipse cover, rgba(149,7,64,1) 0%, rgba(111,34,50,1) 100%) */
    }

    .cpicb {
      background-color: #66fcf1;
      color: #1f2833;
      /* background: -webkit-linear-gradient(45deg, #74abd6 0%, #663d7a 100%); */
      /* background: -webkit-linear-gradient(45deg, #c393db 0%, #663d7a 100%); */
      /* background-color: #663d7a; */
      /* background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, #713b4c), color-stop(20%, #6B2F49), color-stop(54%, #611B45), color-stop(91%, #570641)); */
    }
    /* .scrollbar {
      background-color: #F5F5F5;
      float: left;
      height: 300px;
      margin-bottom: 25px;
      margin-left: 22px;
      margin-top: 40px;
      width: 65px;
      overflow-y: scroll;
    }

    .force-overflow {
      min-height: 450px;
    } */
    .scroll-class::-webkit-scrollbar {
      width: 8px;
      border-radius: 10px;
      background-color: #c2cad0;
    }
    .scroll-class::-webkit-scrollbar-thumb {
      /* background-color: #000000;  */
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.3);
      background-color: #347ab0;
    }
    .scroll-class::-webkit-scrollbar-track {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 8px rgba(0,0,0,0.1);
      background-color: #c2cad0;
    }
    .button{
      border-radius:2em;
    }
  </style>
</head>

<body>
  <!-- Start your project here-->
  <!-- <div class="jumbotron jumbotron-title jumbotron-fluid text-center">
    <div class="container">
      <h1 class="display-3" style="font-size: 2em; color: white">Profile</h1>
    </div>
  </div> -->
  <!-- <div class="scrollbar" id="style-1">
    <div class="force-overflow"></div>
  </div>  -->
  <div class="container">
    <!--<div class="row">-->
    <div class="card-deck">
      <!--<div class="col-4">-->
      <div class="card card2 animated fadeIn">
        <div class="card-block rounded-top ctitle">
          <h2 class="card-title text-center white-text mt-3">Top Scores</h2>
        </div>
        <div class="col-fluid">
          <div class="card-body text-center scroll-class">
            <button class="btn btn-lg cpicb btn-cust text-center mb-3 button font-weight-bold ldb waves-effect">View Leaderboards</button>
            <p class="card-text btn btn-cust btn-lg btn-outline-default font-weight-bold waves-effect">Sports: <?php echo $spor['score']?></p>
            <p class="card-text btn btn-cust btn-lg btn-outline-default font-weight-bold waves-effect">Science: <?php echo $sci['score']?></p>
            <p class="card-text btn btn-cust btn-lg btn-outline-default font-weight-bold waves-effect">Geography: <?php echo $geo['score']?></p>
            <p class="card-text btn btn-cust btn-lg btn-outline-default font-weight-bold waves-effect">History: <?php echo $history['score']?></p>
            <p class="card-text btn btn-cust btn-lg btn-outline-default font-weight-bold waves-effect">Famous Personalities: <?php echo $fam['score']?></p>
            <p class="card-text btn btn-cust btn-lg btn-outline-default font-weight-bold waves-effect">Current Affairs: <?php echo $curr['score']?></p>
            <p class="card-text btn btn-cust btn-lg btn-outline-default font-weight-bold waves-effect">Entertainment: <?php echo $ent['score']?></p>
            <p class="card-text btn btn-cust btn-lg btn-outline-default font-weight-bold waves-effect">Movies: <?php echo $mov['score']?></p>
            <p class="card-text btn btn-cust btn-lg btn-outline-default font-weight-bold waves-effect">Technology: <?php echo $tech['score']?></p>
          </div>
        </div>
      </div>
      <!--</div>-->
      <!--<div class="col-4">-->
      <div class="card card1 animated fadeIn">
        <div class="ctitle rounded-top" style="position:relative; left:0; top:0;">
          <img class="avatar rounded-circle card-img-top mx-auto d-block m-2 z-depth-2" src="img/cat_profile-512.png"
            alt="Card image cap" style="height:20vh;width:20vh;border-radius:50%;background-color:#7986cb;position:relative; top:0; left:0;">
            <img id="badge" src="img/Beginner.png" style="position:absolute; top:5.5em; left:12em;" border=3 height=50 width=50/>

            <div class="card-block">
            <h2 class="card-title text-center pname z-depth-3 cpicb font-weight-bold"></h2>
          </div>
        </div>
        
        <div class="col-fluid">
          <div class="card-body text-center">
            <p class="card-text btn btn-cust lvb btn-lg btn-outline-default font-weight-bold waves-effect">Lvl: <?php echo $lvl['levelname'];?></p>
            <div class="progress mb-2">
              <div class="progress-bar lpro progress-bar-striped bg-success" style="width: 25%;height:1vh"></div>
            </div>
            <p class="card-text btn btn-cust btn-lg btn-outline-default font-weight-bold waves-effect">Experience: <?php echo $lvl['exp'];?></p>
            <p class="card-text btn btn-cust btn-outline-default font-weight-bold waves-effect p-3">Best Category: <?php echo $best['category']; ?></p>
          </div>
        </div>
      </div>
      <!--</div>-->
      <!--<div class="col-4">-->
      <div class="card card3 animated fadeIn">
        <div class="card-block rounded-top ctitle">
          <h2 class="card-title text-center white-text mt-3">Your Stats</h2>
        </div>
        <div class="col-fluid">
          <div class="card-body text-center">
            <canvas id="doughnutChart" class="mt-0"></canvas>
            <button type="button" id="startquiz" class="btn btn-lg cpicb button font-weight-bold btn-cust waves-effect mt-2">Start Quiz</button>
          </div>
        </div>
      </div>
      <!--</div>-->
    </div>
  </div>
  </div>

  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- <script type="text/javascript" src="libs/jquery.mCustomScrollbar.concat.min.js"></script> -->
  <script>
    // alert(lvl);
    var x= "<?php echo $lvl['levelname']?>"
    // alert(x);
    if("<?php echo $lvl['levelname']?>"==="Apprentice")
      document.getElementById("badge").src="img/Apprentice.png";
    else if("<?php echo $lvl['levelname']?>"==="Expert")
      document.getElementById("badge").src="img/Expert.png";
    else
      document.getElementById("badge").src="img/Beginner.png"

    $(".pname").text(name);
    //var lprogress;
    var lv_prog = parseInt("<?php echo $lvl['exp'];?>");
    // alert(lv_prog);
    if(lv_prog < 5000){
      // var lprogress = (lv_prog/5000)*100;
      // alert(lprogress);
      $('.lvb').removeClass("btn-outline-default");
      $('.lvb').addClass("btn-outline-danger");
      $('.lpro').removeClass("bg-success");
      $('.lpro').addClass("bg-danger");
      $('.lpro').css('width', (lv_prog/5000)*100 + '%').attr('aria-valuenow', (lv_prog/5000)*100);
    }
    else if(lv_prog < 20000){
      // var lprogress = (lv_prog/10000)*100;
      $('.lvb').removeClass("btn-outline-default");
      $('.lvb').addClass("btn-outline-warning");
      $('.lpro').removeClass("bg-success");
      $('.lpro').addClass("bg-warning");
      $('.lpro').css('width', ((lv_prog-5000)/15000)*100 + '%').attr('aria-valuenow', ((lv_prog-5000)/15000)*100);
    }
    else if(lv_prog > 20000){
      // var lprogress = 100;
      $('.lvb').removeClass("btn-outline-default");
      $('.lvb').addClass("btn-outline-success");
      $('.lpro').removeClass("bg-success");
      $('.lpro').addClass("bg-success");
      $('.lpro').css('width', 100 + '%').attr('aria-valuenow', 100);
    }
    else{
      $('.lpro').css('width', 0 + '%').attr('aria-valuenow', 0);
    }
    //doughnut
    var gspor = parseInt("<?php echo $uspor['score'];?>");
    var gsci = parseInt("<?php echo $usci['score'];?>");
    var ggeo = parseInt("<?php echo $ugeo['score'];?>");
    var ghis = parseInt("<?php echo $uhistory['score'];?>");
    var gfam = parseInt("<?php echo $ufam['score'];?>");
    var gcurr = parseInt("<?php echo $ucurr['score'];?>");
    var gent = parseInt("<?php echo $uent['score'];?>");
    var gmov = parseInt("<?php echo $umov['score'];?>");
    var gtech = parseInt("<?php echo $utech['score'];?>");

    Chart.defaults.global.defaultFontColor = '#66fcf1';
    // Chart.defaults.global.defaultFontStyle = 'bold';
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
      type: 'doughnut',
      data: {
        labels: ["Sports", "Science", "Geography", "History", "Famous Personalities", "Current Affairs", "Entertainment", "Movies", "Technology"],
        datasets: [{
          borderColor: "lightblue",
          data: [gspor, gsci, ggeo, ghis, gfam, gcurr, gent, gmov, gtech],
          backgroundColor: ["#060d12", "#11293b", "#1d4361", "#295f89", "#347ab0", "#4e94ca", "#74abd6", "#93bedf", "#b0d0e8"],
          hoverBackgroundColor: ["#221428", "#442851", "#663d7a", "#8851a3", "#aa66cc", "#b275d1", "#c393db", "#d4b2e5", "#e5d1ef"]
        }]
        //"#221428", "#442851", "#663d7a", "#8851a3", "#aa66cc", "#b275d1", "#c393db", "#d4b2e5", "#e5d1ef"
      },
      options: {
        responsive: true
      }
    });
  </script>
</body>
<script>
    $("#startquiz").click(function () {
      $("#cat").load("cat.html");
      $("#head").html("Categories");
      $(".nav-item").removeClass("active");
      $(".nav-item").eq(1).addClass("active");
    });
    $(".ldb").click(function () {
      $("#cat").load("hscores.html");
      $("#head").html("Leaderboards");
      $(".nav-item").removeClass("active");
      $(".nav-item").eq(3).addClass("active");
    });
</script>

</html>
