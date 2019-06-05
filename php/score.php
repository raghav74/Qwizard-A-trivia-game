<?php
    $servername="localhost";
    $username="root";
    $password="nithin";
    $db="ques";  
    $conn=mysqli_connect($servername,$username,$password,$db);

    if (!$conn) {
        die("Connection failed:".mysqli_connect_error());
    }
    $category=$_POST["category"];
    $name=$_POST["name"];
    $score=$_POST["score"];

    $sql="INSERT INTO userstats VALUES('0','$name','$category','$score')";
    $lvlsql1="INSERT INTO level VALUES('$name','Beginner','$score')";
    $compsql="SELECT exp FROM level WHERE username='$name'";
    $lvlsql2="UPDATE level SET exp=exp+$score WHERE username='$name'";

    if(!mysqli_query($conn,$lvlsql1)){
        if(mysqli_query($conn,$lvlsql2)){
            echo "Updated Exp";
        }else "Error";
        echo "New Exp";
    }else "Error";
    $res=mysqli_query($conn,$compsql);
    $lvl=mysqli_fetch_assoc($res);

    // if($lvl['exp']>5000){
    //     mysqli_query($conn,"UPDATE level SET levelname='Apprentice' WHERE username='$name'");
    // }

    // if($lvl['exp']>20000){
    //     mysqli_query($conn,"UPDATE level SET levelname='Expert' WHERE username='$name'");

    // }

    if(mysqli_query($conn,$sql)){
        echo "Updated";
    }else "Error";

    mysqli_close($conn);
?>
