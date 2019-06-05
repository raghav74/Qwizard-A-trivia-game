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

    $email=$_POST['email'];
    $pass1=$_POST['pass1'];
    $count=1;
    $sel_sql="SELECT username FROM LOGIN";

    if($row=mysqli_query($conn,$sel_sql)){
        while($result=mysqli_fetch_assoc($row)){
            if($email==$result['username']){
                $count=0;
                break;
            }
        }
    }

    // $sql="INSERT INTO login VALUES('0','$email','$pass1')";
    $sql="CALL inse('0','$email','$pass1')";
    if($count==1){
         if(mysqli_query($conn,$sql)){
            $_SESSION['name']=$email;
            echo 'Success';
         }
    }else echo 'Username already exists';
    mysqli_close($conn);
?>
