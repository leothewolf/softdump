<?php

session_start();
require_once "../config.php";

if(isset($_SESSION["username"])){
  $username = $_SESSION["username"]; 
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  $table = mysqli_fetch_array($result);
  $sid = $table["id"];
  $semail = $table["email"];
  $susername = $table["username"];
  $spassword = $table["password"];  
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      $rusername = $_POST["username"];
      $remail = $_POST["email"];
      $query = "UPDATE users SET username = '$rusername', email = '$remail' WHERE id = $sid";
      if(mysqli_query($conn, $query)){
        $_SESSION["username"] = $rusername; 
        $_SESSION["email"] = $remail;
        header("location: ../profile");
      }
  }
}


?>