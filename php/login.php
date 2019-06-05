<?php
session_start();
  $servername="localhost";
  $username="root";
  $password="nithin";
  $db="ques"; 
  $flag=0;
  $conn=mysqli_connect($servername,$username,$password,$db);
  if (!$conn) {
    die("Connection failed:".mysqli_connect_error());
    }

$lemail=$_POST['lemail'];
$lpass=$_POST['lpass'];
$sel_sql="SELECT username,password FROM login";
if($row=mysqli_query($conn,$sel_sql)){
    while($result=mysqli_fetch_assoc($row)){
        if(($lemail==$result['username'])&&($lpass==$result['password'])){
           echo "Matching";
           $_SESSION['name']=$lemail;
           $flag=1;
           break;
        }
    }
}
if($flag==0){
    echo "Wrong Input";
}
  mysqli_close($conn);
  ?>
