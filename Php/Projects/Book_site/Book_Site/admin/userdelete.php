<?php

session_start();
if(isset($_SESSION["username"])){
    if($_SESSION["username"] != "admin"){
        header("location: ../");
    }else{
        $ausername = $_SESSION["username"];
    }
}else{
    header("location: ../login.php");
}

require_once "config.php";
$username = $_GET['username'];

if(isset($ausername)){
    $curdate = date("j") . "/" . date("n") ."/" . date("Y");
    $date = $curdate;
    $content = "Admin deleted account of ".$username;
    $query = "INSERT INTO logs (username, date, content) VALUES (?, ?, ?)";
    $result = mysqli_prepare($conn, $query);
    if($result){
        mysqli_stmt_bind_param($result, "sss", $param_username, $param_date, $param_content);
        $param_username = "Admin";
        $param_date = $date;
        $param_content = $content;
        if(mysqli_stmt_execute($result)){}mysqli_stmt_close($result);
    }
    
    $query = "DELETE FROM users WHERE username = '$username'";
    $result = mysqli_query($conn,$query);

    $query3 = "DELETE FROM books WHERE username = '$username'";
    $result3 = mysqli_query($conn,$query3);

    $query3 = "DELETE FROM bookmark WHERE username = '$username'";
    $result3 = mysqli_query($conn,$query3);

    $query4 = "DELETE FROM likes WHERE username = '$username'";
    $result4 = mysqli_query($conn,$query4);
    
    header("location: index.php");
}else{
    header("location: ../");
}

?>