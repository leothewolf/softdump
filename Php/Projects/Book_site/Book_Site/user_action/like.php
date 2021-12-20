<?php 

$rusername = $_GET["rusername"];
$tusername = $_GET["tusername"];
$id = $_GET["id"];

session_start();
if(isset($_SESSION["username"])){
    $susername = $_SESSION["username"];
    if($susername == $rusername){
        require_once "config.php";
        $query = "SELECT * FROM likes WHERE id = '$id' AND username = '$rusername'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 0){
            $query1 = "INSERT INTO likes (id, username) VALUES (?, ?)";
            $result1 = mysqli_prepare($conn, $query1);
            if($result1){
                mysqli_stmt_bind_param($result1, "ss", $id, $rusername);
                mysqli_stmt_execute($result1);
                header("location: ../books/" . $tusername . "_". $id .".php");
            }
        }else{
            header("location: ../books/" . $tusername . "_". $id .".php");
        } 
    }else{
        header("location: ../books/" . $tusername . "_". $id .".php");
    }
}else{
    header("location: ../login");
}



?>