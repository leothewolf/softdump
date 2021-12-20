<?php 

$tusername = $_GET["tusername"];
$id = $_GET["id"];

session_start();
if(isset($_SESSION["username"])){
    $susername = $_SESSION["username"];
    if($susername == $tusername){
      require_once "../config.php"; 
        $query = "SELECT * FROM bookmark WHERE id = '$id' AND username = '$tusername'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) != 0){
            $query1 = "DELETE FROM bookmark WHERE id = '$id' AND username = '$tusername'";
            $result1 = mysqli_query($conn,$query1);
            header("location: ./");
        }else{
            header("location: ./");
        } 
    }else{
        header("location: ./");
    }
}else{
    header("location: ../login");
}




?>