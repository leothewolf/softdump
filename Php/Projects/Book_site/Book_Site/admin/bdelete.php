<?php
require_once "config.php";

session_start();
if(isset($_SESSION["username"])){
    if($_SESSION["username"] != "admin"){
        header("location: ../");
    }else{
        $username = $_SESSION["username"];
    }
}else{
    header("location: ../login.php");
}

$tusername = $_GET['tusername'];
$id = $_GET['id'];


$query1="SELECT * FROM books WHERE id = '$id'";
$Table = mysqli_query($conn,$query1);
while($Row=mysqli_fetch_array($Table)){
    $title = $Row["title"];
    $description = $Row["description"];
    $bookc = $Row["bookc"];
}

if($username != "admin"){
    header("location: ../");
}else{
    $curdate = date("j") . "/" . date("n") ."/" . date("Y");
    $date = $curdate;
    $content = $username." deleted book with <br/> Title: ".$title." <br/> Description: ".$description." <br/> Book Content: ".$bookc." <br/> Dated:".$date;
    $query2 = "INSERT INTO logs (username, date, content) VALUES (?, ?, ?)";
    $result2 = mysqli_prepare($conn, $query2);
    if($result2){
        mysqli_stmt_bind_param($result2, "sss", $param_username, $param_date, $param_content);
        $param_username = $username;
        $param_date = $date;
        $param_content = $content;
    if(mysqli_stmt_execute($result2)){}mysqli_stmt_close($result2);
    }
    $query = "DELETE FROM books WHERE id = '$id'";
    $result = mysqli_query($conn,$query);

    $query3 = "DELETE FROM bookmark WHERE id = '$id'";
    $result3 = mysqli_query($conn,$query3);

    $query4 = "DELETE FROM likes WHERE id = '$id'";
    $result4 = mysqli_query($conn,$query4);

    $file = "../books/"."$tusername"."_"."$id".".php";
    unlink($file);

    header("location: index.php");
}

?>