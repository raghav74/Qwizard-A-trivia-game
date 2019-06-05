<?php
   $servername="localhost";
   $username="root";
   $password="nithin";
   $db="ques";  
   $conn=mysqli_connect($servername,$username,$password,$db);
   $counter=1;

   if (!$conn) {
       die("Connection failed:".mysqli_connect_error());
   }
   $sql="SELECT score,username FROM userstats WHERE category='Current Affairs' ORDER BY score DESC";
   echo '<table class="table table-responsive text-center table-hover table-dark animated fadeIn">';
   echo '<thead class="table-h">';
   echo '<tr style="color:#1f2833;">';
   echo '<th class="font-weight-bold text-center">RANK</th>';
   echo '<th class="font-weight-bold text-center">USERNAME</th>';
   echo '<th class="font-weight-bold text-center">SCORE</th>';
   echo '</tr>';
   echo '</thead>';
   echo '<tbody>';
   if($row=mysqli_query($conn,$sql)){
    while($result=mysqli_fetch_assoc($row)){
        echo '<tr class="table-r">
                <td class="font-weight-bold text-center">'.$counter++.'</td>
                <td class="font-weight-bold text-center">'.$result["username"].'</td>
                <td class="font-weight-bold text-center">'.$result["score"].'</td>
              </tr>';
    }

}
  echo '</tbody>';
  echo '</table>';
  mysqli_close($conn);

?>
