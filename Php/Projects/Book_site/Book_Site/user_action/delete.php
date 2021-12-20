<?php

session_start();
require_once "config.php";
$id = $_GET['id'];
$username = $_GET['username'];

if(isset($_SESSION["username"])){
    if($_SESSION["username"] != $username){
        header("location: ../");
    }
}else{
    header("location: ../login");
}


$query1="SELECT * FROM books WHERE id = '$id' AND username = '$username'";
$Table = mysqli_query($conn,$query1);
while($Row=mysqli_fetch_array($Table)){
    $title = $Row["title"];
    $description = $Row["description"];
    $bookc = $Row["bookc"];
}

$curdate = date("j") . "/" . date("n") ."/" . date("Y");
$date = $curdate;
$content = $username." deleted book with <br/> Title: ".$title." <br/> Description: ".$description." <br/> Book Content: ".$bookc." <br/> Dated:".$date;
$query = "INSERT INTO logs (username, date, content) VALUES (?, ?, ?)";
$result = mysqli_prepare($conn, $query);
if($result){
    mysqli_stmt_bind_param($result, "sss", $param_username, $param_date, $param_content);
    $param_username = $username;
    $param_date = $date;
    $param_content = $content;
    if(mysqli_stmt_execute($result)){}mysqli_stmt_close($result);
}

$query = "DELETE FROM books WHERE id = '$id' AND username = '$username'";
$result = mysqli_query($conn,$query);
$query2 = "DELETE FROM bookmark WHERE id = '$id'";
$result2 = mysqli_query($conn,$query2);
$query3 = "DELETE FROM likes WHERE id = '$id'";
$result2 = mysqli_query($conn,$query3);
$file = "../books/"."$username"."_"."$id".".php";
unlink($file);

header("location: ../mybooks");

?>