<?php

session_start();
require_once "config.php";
$username = $_SESSION['username'];

if($username == "admin"){
    $query = "DELETE FROM logs";
    $result = mysqli_query($conn,$query);

    // Log upload for logs clear

    $curdate = date("j") . "/" . date("n") ."/" . date("Y");
    $date = $curdate;
    $content = "Admin cleared all logs";
    $query2 = "INSERT INTO logs (username, date, content) VALUES (?, ?, ?)";
    $result2 = mysqli_prepare($conn, $query2);
    if($result2){
        mysqli_stmt_bind_param($result2, "sss", $param_username, $param_date, $param_content);
        $param_username = $username;
        $param_date = $date;
        $param_content = $content;
    if(mysqli_stmt_execute($result2)){}mysqli_stmt_close($result2);
    }

    header("location: index.php");
}else{
    header("location: ../");
}

?>
