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
        if(mysqli_num_rows($result) != 0){
            $query1 = "DELETE FROM likes WHERE id = '$id' AND username = '$rusername'";
            $result1 = mysqli_query($conn,$query1);
            header("location: ../books/" . $tusername . "_". $id .".php");
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