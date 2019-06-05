
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!-- Bootstrap core CSS -->
  <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
  <!-- Material Design Bootstrap -->
  <!-- <link href="css/mdb.min.css" rel="stylesheet"> -->
  <!-- Your custom styles (optional) -->
  <style>
    /* body {
        background-color: #1c2331;
        background-image: url(img/cubes.png);
    } */
    .table-r{
      background-color: #1f2833;
      color: #66fcf1;
    }
    .table-h{
      background-color: #45a29e;
    }
    .table-r:hover{
      color: #1f2833!important;
    }
  </style>
</head>

<body>
  <!-- <div class="jumbotron jumbotron-title jumbotron-fluid text-center">
    <div class="container">
      <h1 class="display-3" style="font-size: 2em; color: white">navbar space</h1>
    </div>
  </div> -->
  <div class="container">
  <?php
   $servername="localhost";
   $username="root";
   $password="nithin";
   $db="ques";  
   $conn=mysqli_connect($servername,$username,$password,$db);
   $counter=1;
    $pic="";
   if (!$conn) {
       die("Connection failed:".mysqli_connect_error());
   }
$category=$_POST['category'];
  //  $sql="SELECT * FROM userstats WHERE category='$category' ORDER BY score DESC LIMIT 10";
   $sql="SELECT score,username FROM leaderboard WHERE category='$category' LIMIT 10";
   echo '<table class="table table-responsive table-hover table-dark animated fadeIn">';
   echo '<thead class="table-h">';
   echo '<tr style="color:#1f2833;">';
   echo '<th class="font-weight-bold">RANK</th>';
   echo '<th class="font-weight-bold">USERNAME</th>';
   echo '<th class="font-weight-bold">SCORE</th>';
   echo '</tr>';
   echo '</thead>';
   echo '<tbody>';
   if($row=mysqli_query($conn,$sql)){
    while($result=mysqli_fetch_assoc($row)){
      $name=$result["username"];
      $expr=mysqli_fetch_assoc(mysqli_query($conn,"SELECT exp FROM level WHERE username='$name'"));
      echo $expr['exp']." ";
      if($expr['exp']<5000){
        $pic="img/Beginner.png";
      }else if($expr['exp']>5000&&$expr["exp"]<20000){
        $pic="img/Apprentice.png";       
      }else $pic="img/Expert.png";
      // echo $pic;
      echo '<tr class="table-r">
              <td class="font-weight-bold">'.$counter++.'</td>
              <td class="font-weight-bold"><img src="'.$pic.'" alt="" border=3 height=30 width=30 style="margin-right:10px;"></img>'.$result["username"].'</td>
              <td class="font-weight-bold">'.$result["score"].'</td>
            </tr>';
    }

}
  echo '</tbody>';
  echo '</table>';
  mysqli_close($conn);

?>

  </div>
  <!--end of container-->
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <!-- <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> -->
  <!-- Bootstrap tooltips -->
  <!-- <script type="text/javascript" src="js/popper.min.js"></script> -->
  <!-- Bootstrap core JavaScript -->
  <!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
  <!-- MDB core JavaScript -->
  <!-- <script type="text/javascript" src="js/mdb.min.js"></script> -->
</body>
</html>
