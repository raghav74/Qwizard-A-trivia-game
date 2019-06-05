<?php
    $servername="localhost";
    $username="root";
    $password="nithin";
    $db="ques";  
    $conn=mysqli_connect($servername,$username,$password,$db);

    if (!$conn) {
        die("Connection failed:".mysqli_connect_error());
    }

    $category=$_POST['category'];
    $ques=$_POST['ques'];
    $op1=$_POST['op1'];
    $op2=$_POST['op2'];
    $op3=$_POST['op3'];
    $op4=$_POST['op4'];
    $ans=$_POST['ans'];

    $sql="INSERT INTO ques VALUES ('0','$category','$ques','$op1','$op2','$op3','$op4','$ans')";

    if(mysqli_query($conn,$sql)){
        echo "Done";
    }else echo "Error";

    mysqli_close($conn);

?>
