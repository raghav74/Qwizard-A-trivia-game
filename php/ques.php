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

    $sql="SELECT * FROM ques WHERE category='$category' ORDER BY RAND() LIMIT 7";

    $jsondata='[';
    if($row=mysqli_query($conn,$sql)){
        while($result=mysqli_fetch_assoc($row)){
            $jsondata.= '{';
            $jsondata.= '"question":"'.$result["questions"].'",';
            $jsondata.= '"options":["'.$result["option1"].'","'.$result["option2"].'","'.$result["option3"].'","'.$result["option4"].'"],';
            $jsondata.= '"answer":"'.$result["answer"].'"';
            $jsondata.= '},';
        }
        $jsondata=chop($jsondata,',');
        $jsondata.=']';
    }else echo 'Error';

    echo $jsondata;
    mysqli_close($conn);

?>
